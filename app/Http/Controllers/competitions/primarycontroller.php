<?php

namespace App\Http\Controllers\competitions;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Contest;
use App\Models\ContestsProblem;
use App\Models\Problem;
use App\Models\Language;
use Carbon\Carbon;
use App\Models\Score;
use App\Models\TeamUser;
use Illuminate\Support\Facades\Gate;
use App\Http\Resources\ProblemResource;
use App\Http\Resources\ParticipantsResource;
use App\Http\Resources\TeamResource;
use App\Models\SubmissionsLog;
use App\Models\User;
use App\Models\Team;
use App\Models\ContestUser;
use Illuminate\Support\Facades\Auth;
use phpDocumentor\Reflection\PseudoTypes\True_;

class primarycontroller extends Controller
{
  public function competitions($sort = null)
  {
    switch ($sort) {
      case "live":
        $contests = Contest::with('competitor')->where('starting_date', '<=', date('Y-m-d H:i:s'))
          ->where('ending_date', '>=', date('Y-m-d H:i:s'))->where('status', '=', 1)->get();
        $live = $contests->count();
        $all = Contest::where('status', '=', 1)->count();
        $upcoming = Contest::where('starting_date', '>', date('Y-m-d H:i:s'))->where('status', '=', 1)->count();
        $archived = Contest::where('ending_date', '<', date('Y-m-d H:i:s'))->where('status', '=', 1)->count();

        break;
      case "upcoming":
        $contests = Contest::with('competitor')->where('starting_date', '>', date('Y-m-d H:i:s'))->where('status', '=', 1)->get();
        $upcoming = $contests->count();
        $all = Contest::where('status', '=', 1)->count();
        $live = Contest::where('starting_date', '<=', date('Y-m-d H:i:s'))
          ->where('ending_date', '>=', date('Y-m-d H:i:s'))->where('status', '=', 1)->count();
        $archived = Contest::where('ending_date', '<', date('Y-m-d H:i:s'))->where('status', '=', 1)->count();

        break;
      case "archived":
        $contests = Contest::with('competitor')->where('ending_date', '<', date('Y-m-d H:i:s'))->where('status', '=', 1)->get();
        $archived = $contests->count();
        $all = Contest::where('status', '=', 1)->count();
        $live = Contest::where('starting_date', '<=', date('Y-m-d H:i:s'))
          ->where('ending_date', '>=', date('Y-m-d H:i:s'))->where('status', '=', 1)->count();
        $upcoming = Contest::where('starting_date', '>', date('Y-m-d H:i:s'))->where('status', '=', 1)->count();
        break;
      default:
        $contests = Contest::with('competitor')->where('status', '=', 1)->get();
        $all = $contests->count();
        $live = Contest::where('starting_date', '<=', date('Y-m-d H:i:s'))
          ->where('ending_date', '>=', date('Y-m-d H:i:s'))->where('status', '=', 1)->count();
        $upcoming = Contest::where('starting_date', '>', date('Y-m-d H:i:s'))->where('status', '=', 1)->count();
        $archived = Contest::where('ending_date', '<', date('Y-m-d H:i:s'))->where('status', '=', 1)->count();
    }



    //return view('admin.contests.view',['contests'=>$contests],['live'=>$live],['upcoming'=>$upcoming],['archived'=>$archived]);
    return view('competitions.view')
      ->with('contests', $contests)
      ->with('live', $live)
      ->with('upcoming', $upcoming)
      ->with('archived', $archived)
      ->with('all', $all);
  }

  public function ShowCompetition($name)
  {
    $name = str_replace("_", " ", $name);

    $contest = Contest::with('languages', 'competitor')->where('name', $name)->where('status', '=', 1)->firstOrFail();

    if ($contest) {

      //dd($contest[0]->starting_date);
      $startTime = Carbon::parse($contest->starting_date);
      $endTime = Carbon::parse(date('Y-m-d H:i:s'));

      $totalDuration = $endTime->diffForHumans($startTime);
      // dd($totalDuration);
      // Test if string contains the word 
      if (strpos($totalDuration, 'before') !== false) {
        $totalDuration  = str_replace("before", "", $totalDuration);
      } else {
        if (($contest->starting_date <= date('Y-m-d H:i:s')) & ($contest->ending_date >= date('Y-m-d H:i:s'))) {
          $totalDuration  = 'started';
        } else
          $totalDuration  = 'closed';
      }

      //check if user sub to comp
      $sub = FALSE;
      if (!is_null(Auth::user())) {
        if (!is_null(ContestUser::where('user_id', '=', Auth::user()->id)->where('contest_id', '=',  $contest->id)->where('role', '=', 'competitor')->first())) {
          $sub = TRUE;
        }
      }




      return view('competitions.show')
        ->with('contest', $contest)
        ->with('time', $totalDuration)
        ->with('sub', $sub);
    } else {
      abort(404);
    }
  }
  public function challenges($name)
  {
    $name = str_replace("_", " ", $name);
    $contest = Contest::with('problems','teams')->where('name', $name)->where('status', '=', 1)->firstOrFail();
    if ($contest) {
      
      if ($this->SubmittingIsOpen($contest)) {
        //if partispate 
        if ($this->IsSubscribe($contest, Auth::user()->id)) {
          $AllProblem = ProblemResource::collection($contest->problems, $name);


          $AllProblem = json_decode(json_encode($AllProblem));


          for ($i = 0; $i < $contest->problems->count(); $i++) {


            $check = Gate::allows('QuestionIsSolved', [$contest, $contest->problems[$i]->id]);

            if ($check) {
              $AllProblem[$i]->solve = 1;
            }
          }

          return view('competitions.challenges')
            ->with('contest', $contest)
            ->with('AllProblem', $AllProblem);
        } else {
          return view('competitions.challenges')
            ->with('contest', $contest)
            ->with('AllProblem', $AllProblem = []);
        }
      } else {
        return view('competitions.challenges')
          ->with('contest', $contest)
          ->with('AllProblem', $AllProblem = []);
      }
    } else {
      abort(404);
    }
  }
  public function participants($name)
  {
    $name = str_replace("_", " ", $name);
    $contest = Contest::with('competitor')->where('name', $name)->where('status', '=', 1)->firstOrFail();
    if ($contest) {
      //check if contest is solo
      if ($contest->participation == 'solo') {

        $AllCompetitor = ParticipantsResource::collection($contest->competitor, $name);
        //dd(json_encode($AllCompetitor));



        return view('competitions.participants')
          ->with('contest', $contest)
          ->with('AllCompetitor', $AllCompetitor);
      } else {
        abort(404);
      }
    } else {
      abort(404);
    }
  }
  public function teams($name)
  {
    $name = str_replace("_", " ", $name);
    $contest = Contest::with('teams')->where('name', $name)->where('status', '=', 1)->firstOrFail();
    if ($contest) {

      //check if contest is team
      if ($contest->participation == 'team') {
        $teamwithuser = [];
        $part = array();
        foreach ($contest->teams as $team) {
          $teamwithuser[] = Team::with('users')->where('id', $team->id)->first();
          foreach ($team->users as $user) {
            array_push($part, $user->username);
          }
        }

        $admin = FALSE;
        if (Gate::allows('OrganizerOrAdmin', $contest->id)) {
          $admin = TRUE;
        }
        $myuser = null;
        $actuion = FALSE;
        $ihaveteam = FALSE;
        if (!is_null(Auth::user())) {
          $myuser = Auth::user();
          if (!is_null(ContestUser::where('user_id', '=', $myuser->id)->where('contest_id', '=',  $contest->id)->first())) {
            $actuion = TRUE;
            if (in_array($myuser->username, $part)) {
              $ihaveteam = True;
            }
          }
        }
        return view('competitions.teams')
          ->with('contest', $contest)
          ->with('teamwithuser', $teamwithuser)
          ->with('admin', $admin)
          ->with('myuser', $myuser)
          ->with('actuion', $actuion)
          ->with('ihaveteam', $ihaveteam);
      } else {
        abort(404);
      }
    } else {
      abort(404);
    }
  }


  public function competitionlog($name)
  {
    $name = str_replace("_", " ", $name);
    $contest = Contest::with('submissionlog', 'competitor', 'teams', 'problems', 'languages')->where('name', $name)->where('status', '=', 1)->firstOrFail();
    $problems =  Problem::has('Testcases')->where('status', 1)->get();
    $Language =  Language::where('status', 1)->get();
    if ($contest) {
      if (Gate::allows('OrganizerOrAdmin', $contest->id)) {

        //dd($contest->submissionlog);

        $startTime = Carbon::parse($contest->starting_date);
        $endTime = Carbon::parse(date('Y-m-d H:i:s'));

        $totalDuration = $endTime->diffForHumans($startTime);
        // dd($totalDuration);
        // Test if string contains the word 
        if (strpos($totalDuration, 'before') !== false) {
          $totalDuration  = str_replace("before", "", $totalDuration);
        } else {
          if (($contest->starting_date <= date('Y-m-d H:i:s')) & ($contest->ending_date >= date('Y-m-d H:i:s'))) {
            $totalDuration  = 'started';
          } else
            $totalDuration  = 'closed';
        }



        $tablename = 'COMPETITTTION LOG';
        $tabledesc = 'Shows all attempts submission to Judge System';
        return view('competitions.manage.log')
          ->with('contest', $contest)
          ->with('tablename', $tablename)
          ->with('tabledesc', $tabledesc)
          ->with('time', $totalDuration)
          ->with('library', $problems)
          ->with('language', $Language);
      } else {
        abort(403);
      }
    } else {
      abort(404);
    }
  }

  public function competitionparticipants($name)
  {
    $name = str_replace("_", " ", $name);
    $contest = Contest::with('submissionlog', 'competitor', 'teams', 'problems', 'languages')->where('name', $name)->where('status', '=', 1)->firstOrFail();
    $problems =  Problem::has('Testcases')->where('status', 1)->get();
    $Language =  Language::where('status', 1)->get();
    if ($contest) {

      if (Gate::allows('OrganizerOrAdmin', $contest->id)) {
        $startTime = Carbon::parse($contest->starting_date);
        $endTime = Carbon::parse(date('Y-m-d H:i:s'));

        $totalDuration = $endTime->diffForHumans($startTime);

        if (strpos($totalDuration, 'before') !== false) {
          $totalDuration  = str_replace("before", "", $totalDuration);
        } else {
          if (($contest->starting_date <= date('Y-m-d H:i:s')) & ($contest->ending_date >= date('Y-m-d H:i:s'))) {
            $totalDuration  = 'started';
          } else
            $totalDuration  = 'closed';
        }



        $tablename = 'COMPETITOR';
        $tabledesc = 'Deleting a competitor from here will delete all their data from the competition';
        return view('competitions.manage.participants')
          ->with('contest', $contest)
          ->with('tablename', $tablename)
          ->with('tabledesc', $tabledesc)
          ->with('time', $totalDuration)
          ->with('library', $problems)
          ->with('language', $Language);
      } else {
        abort(403);
      }
    } else {
      abort(404);
    }
  }

  public function  competitionorganizers($name)
  {
    $name = str_replace("_", " ", $name);
    $contest = Contest::with('submissionlog', 'competitor', 'teams', 'problems', 'organizer', 'languages')->where('name', $name)->where('status', '=', 1)->firstOrFail();
    $problems =  Problem::has('Testcases')->where('status', 1)->get();
    $Language =  Language::where('status', 1)->get();
    if ($contest) {

      if (Gate::allows('OrganizerOrAdmin', $contest->id)) {
        $startTime = Carbon::parse($contest->starting_date);
        $endTime = Carbon::parse(date('Y-m-d H:i:s'));

        $totalDuration = $endTime->diffForHumans($startTime);

        if (strpos($totalDuration, 'before') !== false) {
          $totalDuration  = str_replace("before", "", $totalDuration);
        } else {
          if (($contest->starting_date <= date('Y-m-d H:i:s')) & ($contest->ending_date >= date('Y-m-d H:i:s'))) {
            $totalDuration  = 'started';
          } else
            $totalDuration  = 'closed';
        }


        $tablename = 'ORGANIZERS';
        $tabledesc = 'List of organizers for this competition';
        return view('competitions.manage.organizers')
          ->with('contest', $contest)
          ->with('tablename', $tablename)
          ->with('tabledesc', $tabledesc)
          ->with('time', $totalDuration)
          ->with('library', $problems)
          ->with('language', $Language);
      } else {
        abort(403);
      }
    } else {
      abort(404);
    }
  }

  public function competitionoquestionlibrary($name)
  {
    $name = str_replace("_", " ", $name);
    $contest = Contest::with('submissionlog', 'competitor', 'teams', 'problems', 'languages')->where('name', $name)->where('status', '=', 1)->firstOrFail();
    $problems =  Problem::has('Testcases')->where('status', 1)->get();
    $Language =  Language::where('status', 1)->get();

    if ($contest) {

      if (Gate::allows('OrganizerOrAdmin', $contest->id)) {
        $startTime = Carbon::parse($contest->starting_date);
        $endTime = Carbon::parse(date('Y-m-d H:i:s'));

        $totalDuration = $endTime->diffForHumans($startTime);

        if (strpos($totalDuration, 'before') !== false) {
          $totalDuration  = str_replace("before", "", $totalDuration);
        } else {
          if (($contest->starting_date <= date('Y-m-d H:i:s')) & ($contest->ending_date >= date('Y-m-d H:i:s'))) {
            $totalDuration  = 'started';
          } else
            $totalDuration  = 'closed';
        }



        $tablename = 'QUESTION LIBRARY';
        $tabledesc = 'Manage questions related to the competition';
        return view('competitions.manage.questionlibrary')
          ->with('contest', $contest)
          ->with('tablename', $tablename)
          ->with('tabledesc', $tabledesc)
          ->with('time', $totalDuration)
          ->with('library', $problems)
          ->with('language', $Language);
      } else {
        abort(403);
      }
    } else {
      abort(404);
    }
  }

  public function  competitionlanguages($name)
  {
    $name = str_replace("_", " ", $name);
    $contest = Contest::with('submissionlog', 'competitor', 'teams', 'problems', 'languages')->where('name', $name)->where('status', '=', 1)->firstOrFail();
    $problems =  Problem::has('Testcases')->where('status', 1)->get();
    $Language =  Language::where('status', 1)->get();
    if ($contest) {

      if (Gate::allows('OrganizerOrAdmin', $contest->id)) {
        $startTime = Carbon::parse($contest->starting_date);
        $endTime = Carbon::parse(date('Y-m-d H:i:s'));

        $totalDuration = $endTime->diffForHumans($startTime);

        if (strpos($totalDuration, 'before') !== false) {
          $totalDuration  = str_replace("before", "", $totalDuration);
        } else {
          if (($contest->starting_date <= date('Y-m-d H:i:s')) & ($contest->ending_date >= date('Y-m-d H:i:s'))) {
            $totalDuration  = 'started';
          } else
            $totalDuration  = 'closed';
        }



        $tablename = 'LANGUAGES';
        $tabledesc = 'Manage languages related to the competition';
        return view('competitions.manage.languagessupport')
          ->with('contest', $contest)
          ->with('tablename', $tablename)
          ->with('tabledesc', $tabledesc)
          ->with('time', $totalDuration)
          ->with('library', $problems)
          ->with('language', $Language);
      } else {
        abort(403);
      }
    } else {
      abort(404);
    }
  }

  public function SubmittingIsOpen($contest)
  {


    if (($contest->starting_date < date('Y-m-d H:i:s')) && ($contest->ending_date > date('Y-m-d H:i:s')) && ($contest->status == 1)) {
      return True;
    } else {
      //change this
      return True;
    }
  }

  public function IsSubscribe($contest, $userid)
  {



    if ($contest->participation == 'solo') {

      $contestuser = ContestUser::where('user_id', $userid)->where('contest_id', $contest->id)->first();

      if (!is_null($contestuser))
        return TRUE;
      else
        return FALSE;
    } else {
      return Gate::allows('IAmCompetitorOnTeam', [$contest->id, $userid]);
    }
  }
}
