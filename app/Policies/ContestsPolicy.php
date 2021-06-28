<?php

namespace App\Policies;

use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;
use Illuminate\Support\Facades\Auth;
use App\Models\Contest;
use App\Models\Team;
use App\Models\Score;
use App\Models\TeamUser;
use App\Models\ContestUser;
use App\Models\Problem;
use phpDocumentor\Reflection\PseudoTypes\True_;

class ContestsPolicy
{
    use HandlesAuthorization;

    /**
     * Create a new policy instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    public function creat()
    {


        return Auth::user()->role === 'admin' || Auth::user()->role === 'manager';
    }

    public function OrganizerOrAdmin($request, $ContestId)
    {

        if (!is_null(Contest::find($ContestId))) {
            if (Auth::user()->role === 'admin' || Auth::user()->role === 'manager') {
                return true;
            } else {
                if (!is_null(ContestUser::where('user_id', Auth::user()->id)
                    ->where('contest_id', $ContestId)->where('role', 'organizer')->first())) {
                    return true;
                } else
                    return FALSE;
            }
        } else
            return FALSE;
    }

    public function IAmCompetitor($request, $ContestId)
    {

        if (is_null(ContestUser::where('user_id', Auth::user()->id)->where('contest_id', $ContestId)->first()))
            return FALSE;
        else
            return TRUE;
    }

    public function IAmCompetitorOnTeam($request, $ContestId, $userId = null)
    {
        $contest = Contest::with('teams')->find($ContestId);
        if ($userId != null) {
            $usercheck = User::find($userId);
        } else {
            $usercheck = Auth::user();
        }


        if ($contest->participation == 'team') {
            $teamwithuser = [];
            $part = array();
            foreach ($contest->teams as $team) {
                $teamwithuser[] = Team::with('users')->where('id', $team->id)->first();
                foreach ($team->users as $user) {
                    array_push($part, $user->username);
                }
            }
            if (in_array($usercheck->username, $part)) {
                return TRUE;
            } else {
                return FALSE;
            }
        } else {
            return FALSE;
        }
    }

    public function QuestionIsSolved($request, $contest, $problemid)
    {

        if($contest->participation == 'solo')
        {
            $Score = Score::where('contest_id' , $contest->id )->where('problem_id' , $problemid)->where('user_id', Auth::user()->id)->first();
            if(!is_null($Score))
            {return TRUE;}
            else
            {
             return FALSE;
            }

        }
        else
        {
            
            $comteam = [];
            foreach ($contest->teams as $team) {
              $comteam[] = $team->id;
            }

$myteam = TeamUser::where('user_id' ,Auth::user()->id)->whereIn('team_id' , $comteam )->first();

$teamuser = TeamUser::where('team_id' ,$myteam->team_id)->get();

foreach ($teamuser  as $user) {
    $Score = Score::where('contest_id' , $contest->id )->where('problem_id' , $problemid)->where('user_id', $user->user_id)->first();
            if(!is_null($Score))
            {return TRUE;}
  }
  return FALSE;


        }
                                                                                                                                                       



    }
}
