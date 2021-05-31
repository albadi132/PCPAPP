<?php

namespace App\Http\Controllers\competitions;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Contest;
use App\Models\Problem;
use App\Models\ContestUser;
use App\Models\ContestProblem;
use App\Models\ContestLanguage;
use App\Models\Language;
use App\Models\Score;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use Symfony\Component\Process\Exception\ProcessFailedException;
use Symfony\Component\Process\Process;
use Symfony\Component\Process\InputStream;

class DealWithProblem extends Controller
{
  public function problem($Cname, $Pname)
  {
    $Cname = str_replace("_", " ", $Cname);
    $Pname = str_replace("_", " ", $Pname);

    $contest = Contest::with('languages' , 'submissionlog')->where('name', $Cname)->where('status', '=', 1)->firstOrFail();
    $problem = Problem::where('name', $Pname)->firstOrFail();

    if (($contest) && ($problem)) {

$top3 = Score::where('contest_id' ,$contest->id )->where('problem_id' ,$problem->id)->orderBy('created_at', 'ASC')->take(3)->get();


      return view('competitions.problem')
        ->with('contest', $contest)
        ->with('problem', $problem)
        ->with('top3', $top3);
    } //cin't find Contest && problem
    else {
      abort(404);
    }
  }

  
  


}
