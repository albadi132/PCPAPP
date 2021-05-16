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
use App\Models\User;
use App\Models\ContestUser;
use Illuminate\Support\Facades\Auth;



class primarycontroller extends Controller
{
    public function competitions($sort = null)
    {
        switch ($sort) {
            case "live":
                $contests = Contest::with('competitor')->where('starting_date', '<=', date('Y-m-d H:i:s'))
            ->where('ending_date', '>=', date('Y-m-d H:i:s'))->where('status','=',1)->get();
            $live = $contests->count();
            $all = Contest::where('status','=',1)->count();
            $upcoming= Contest::where('starting_date', '>', date('Y-m-d H:i:s'))->where('status','=',1)->count();
            $archived= Contest::where('ending_date', '<', date('Y-m-d H:i:s'))->where('status','=',1)->count();
             
              break;
            case "upcoming":
                $contests = Contest::with('competitor')->where('starting_date', '>', date('Y-m-d H:i:s'))->where('status','=',1)->get();
                $upcoming = $contests->count();
                $all = Contest::where('status','=',1)->count();
                $live = Contest::where('starting_date', '<=', date('Y-m-d H:i:s'))
            ->where('ending_date', '>=', date('Y-m-d H:i:s'))->where('status','=',1)->count();
            $archived= Contest::where('ending_date', '<', date('Y-m-d H:i:s'))->where('status','=',1)->count();

              break;
            case "archived":
                $contests= Contest::with('competitor')->where('ending_date', '<', date('Y-m-d H:i:s'))->where('status','=',1)->get();
                $archived = $contests->count();
                $all = Contest::where('status','=',1)->count();
                $live = Contest::where('starting_date', '<=', date('Y-m-d H:i:s'))
            ->where('ending_date', '>=', date('Y-m-d H:i:s'))->where('status','=',1)->count();
            $upcoming= Contest::where('starting_date', '>', date('Y-m-d H:i:s'))->where('status','=',1)->count();
              break;
            default:
            $contests = Contest::with('competitor')->where('status','=',1)->get();
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

$contest = Contest::with('languages' , 'competitor')->where('name', $name)->where('status','=',1)->firstOrFail();

      if($contest)
      {
        
        //dd($contest[0]->starting_date);
        $startTime = Carbon::parse($contest->starting_date);
    $endTime = Carbon::parse(date('Y-m-d H:i:s'));

    $totalDuration = $endTime->diffForHumans($startTime);
   // dd($totalDuration);
    // Test if string contains the word 
if(strpos($totalDuration, 'before') !== false){
  $totalDuration  = str_replace("before", "", $totalDuration );
} else{
  if( ($contest->starting_date <= date('Y-m-d H:i:s')) & ($contest->ending_date >= date('Y-m-d H:i:s') ))
  {$totalDuration  = 'started';}
  else
  $totalDuration  = 'closed';
}

//check if user sub to comp
$sub = FALSE;
if(!is_null(Auth::user()))
{
if(!is_null(ContestUser::where( 'user_id', '=' , Auth::user()->id )->where( 'contest_id' , '=' ,  $contest->id )->where('role' , '=' ,'competitor')->first()))
{
  $sub = TRUE;
}
}

    
    

        return view('competitions.show')
        ->with('contest', $contest)
        ->with('time', $totalDuration)
        ->with('sub', $sub);

      }
      else{abort(404);}
        




    }
public function challenges($name)
{
  $name = str_replace("_", " ", $name);
  $contest = Contest::with('problems')->where('name', $name)->where('status','=',1)->firstOrFail();
  if($contest)
  {
    $AllProblem = ProblemResource::collection($contest->problems,$name);

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
  $contest = Contest::where('name', $name)->where('status','=',1)->firstOrFail();
  if($contest)
  {
    return view('competitions.participants')
  ->with('contest', $contest);
  }
  else{abort(404);}

}
public function teams($name)
{
  $name = str_replace("_", " ", $name);
  $contest = Contest::where('name', $name)->where('status','=',1)->firstOrFail();
  if($contest)
  {
   
    return view('competitions.teams')
  ->with('contest', $contest);
  }
  else{abort(404);}

  

}
public function scoreboard($name)
{
  $name = str_replace("_", " ", $name);
  $contest = Contest::where('name', $name)->where('status','=',1)->firstOrFail();
  if($contest)
  {
    
    return view('competitions.scoreboard')
  ->with('contest', $contest);
  }
  else{abort(404);}

  

}

}
