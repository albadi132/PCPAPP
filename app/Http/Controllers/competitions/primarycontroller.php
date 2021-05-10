<?php

namespace App\Http\Controllers\competitions;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Contest;
use App\Models\ContestsProblem;
use App\Models\Problem;
use Carbon\Carbon;
use Illuminate\Support\Facades\Gate;
use App\Http\Resources\ProblemResource;


class primarycontroller extends Controller
{
    public function competitions($sort = null)
    {
        switch ($sort) {
            case "live":
                $contests = Contest::where('starting_date', '<=', date('Y-m-d H:i:s'))
            ->where('ending_date', '>=', date('Y-m-d H:i:s'))->where('status','=',1)->get();
            $live = $contests->count();
            $all = Contest::where('status','=',1)->count();
            $upcoming= Contest::where('starting_date', '>', date('Y-m-d H:i:s'))->where('status','=',1)->count();
            $archived= Contest::where('ending_date', '<', date('Y-m-d H:i:s'))->where('status','=',1)->count();
             
              break;
            case "upcoming":
                $contests = Contest::where('starting_date', '>', date('Y-m-d H:i:s'))->where('status','=',1)->get();
                $upcoming = $contests->count();
                $all = Contest::where('status','=',1)->count();
                $live = Contest::where('starting_date', '<=', date('Y-m-d H:i:s'))
            ->where('ending_date', '>=', date('Y-m-d H:i:s'))->where('status','=',1)->count();
            $archived= Contest::where('ending_date', '<', date('Y-m-d H:i:s'))->where('status','=',1)->count();

              break;
            case "archived":
                $contests= Contest::where('ending_date', '<', date('Y-m-d H:i:s'))->where('status','=',1)->get();
                $archived = $contests->count();
                $all = Contest::where('status','=',1)->count();
                $live = Contest::where('starting_date', '<=', date('Y-m-d H:i:s'))
            ->where('ending_date', '>=', date('Y-m-d H:i:s'))->where('status','=',1)->count();
            $upcoming= Contest::where('starting_date', '>', date('Y-m-d H:i:s'))->where('status','=',1)->count();
              break;
            default:
            $contests = Contest::where('status','=',1)->get();
            $all = $contests->count();
            $live = Contest::where('starting_date', '<=', date('Y-m-d H:i:s'))
            ->where('ending_date', '>=', date('Y-m-d H:i:s'))->where('status','=',1)->count();
            $upcoming= Contest::where('starting_date', '>', date('Y-m-d H:i:s'))->where('status','=',1)->count();
            $archived= Contest::where('ending_date', '<', date('Y-m-d H:i:s'))->where('status','=',1)->count();
          }
       
            

        //return view('admin.contests.view',['contests'=>$contests],['live'=>$live],['upcoming'=>$upcoming],['archived'=>$archived]);
        return view('competitions.view')
            ->with('contests', $contests)
            ->with('live', $live)
            ->with('upcoming', $upcoming)
            ->with('archived', $archived)
            ->with('all',$all);
    
        
    }

    public function ShowCompetition($name)
    {
      $name = str_replace("_", " ", $name);

      if(Contest::where('name', $name)->where('status','=',1)->firstOrFail())
      {
        $contest = Contest::where('name', $name)->get();
        //dd($contest[0]->starting_date);
        $startTime = Carbon::parse($contest[0]->starting_date);
    $endTime = Carbon::parse(date('Y-m-d H:i:s'));

    $totalDuration = $endTime->diffForHumans($startTime);
   // dd($totalDuration);
    // Test if string contains the word 
if(strpos($totalDuration, 'before') !== false){
  $totalDuration  = str_replace("before", "", $totalDuration );
} else{
  if( ($contest[0]->starting_date <= date('Y-m-d H:i:s')) & ($contest[0]->ending_date >= date('Y-m-d H:i:s') ))
  {$totalDuration  = 'started';}
  else
  $totalDuration  = 'closed';
}
    
    

        return view('competitions.show')
        ->with('contest', $contest)
        ->with('time', $totalDuration);

      }
      else{abort(404);}
        




    }
public function challenges($name)
{
  $name = str_replace("_", " ", $name);
  if(Contest::where('name', $name)->where('status','=',1)->firstOrFail())
  {

    $contest = Contest::with('problems')->where('name', $name)->get();
    $AllProblem = ProblemResource::collection($contest[0]->problems);

  //dd(json_encode($AllProblem));

    
  return view('competitions.challenges')
  ->with('contest', $contest)
  ->with('AllProblem',$AllProblem);
  }
  else{abort(404);}

}
public function participants($name)
{
  $name = str_replace("_", " ", $name);
  if(Contest::where('name', $name)->where('status','=',1)->firstOrFail())
  {
    $contest = Contest::where('name', $name)->get();
    return view('competitions.participants')
  ->with('contest', $contest);
  }
  else{abort(404);}

}
public function teams($name)
{
  $name = str_replace("_", " ", $name);
  if(Contest::where('name', $name)->where('status','=',1)->firstOrFail())
  {
    $contest = Contest::where('name', $name)->get();
    return view('competitions.teams')
  ->with('contest', $contest);
  }
  else{abort(404);}

  

}
public function scoreboard($name)
{
  $name = str_replace("_", " ", $name);
  if(Contest::where('name', $name)->where('status','=',1)->firstOrFail())
  {
    $contest = Contest::where('name', $name)->get();
    return view('competitions.scoreboard')
  ->with('contest', $contest);
  }
  else{abort(404);}

  

}

}
