<?php

namespace App\Http\Controllers\competitions;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Contest;
use App\Models\ContestsProblem;

class ReturnProblems extends Controller
{
    
    public function AllContestChallenges($ContestID)
    {
        $ProblemAryy = ContestsProblem::where('contest_id',$ContestID).get('problem_id');

        



    }


}
