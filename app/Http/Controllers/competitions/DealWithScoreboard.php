<?php

namespace App\Http\Controllers\competitions;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Contest;
use App\Models\Score;
use App\Models\TeamUser;


class DealWithScoreboard extends Controller
{
    public function scoreboardsolo($name)
    {
        $name = str_replace("_", " ", $name);
        $contest = Contest::where('name', $name)->where('status', '=', 1)->firstOrFail();
        if ($contest) {

            if ($contest->participation == "solo") {


                $contest = Contest::with('problems' , 'competitor')->find($contest->id);
                $score = Score::where('contest_id', $contest->id)->get();
                
                //dd($contest->competitor);
               // dd($score->where("user_id" , 12 )->sum('points'));
                
                return view('competitions.scoreboard')
                    ->with('contest', $contest)
                    ->with('score' , $score);

            } else {
                abort(404);

            }
        } else {
            abort(404);
        }
    }

    public function scoreboardteam($name)
    {
        $name = str_replace("_", " ", $name);
        $contest = Contest::where('name', $name)->where('status', '=', 1)->firstOrFail();
        if ($contest) {

            if ($contest->participation == "team") {


                $contest = Contest::with('problems' ,'teams')->find($contest->id);

                $usersonteam= [];

                foreach($contest->teams as $team)
                {
                    $usersonteam[] = TeamUser::where('team_id' , $team->id)->get();
                }
                $score = Score::where('contest_id', $contest->id)->get();
                
                //dd($contest->competitor);
               // dd($score->where("user_id" , 12 )->sum('points'));
                //dd( $usersonteam[0][0]->user_id);
                return view('competitions.teamscoreboard')
                    ->with('contest', $contest)
                    ->with('score' , $score)
                    ->with('usersonteam', $usersonteam);
                    

            } else {
                abort(404);

            }
        } else {
            abort(404);
        }
    }

    public function IsContestStarted($id)
    {
        $contest = Contest::find($id);
        if (!is_null($contest)) {
            if (($contest->starting_date < date('Y-m-d H:i:s')) && ($contest->status == 1)) {
                return True;
            } else {
                //change this
                return True;
            }
        } else {
            return FALSE;
        }
    }
}
