<?php

namespace App\Http\Controllers\competitions;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Contest;
use App\Models\Problem;
use Illuminate\Support\Facades\Gate;

class DealWithProblem extends Controller
{
    public function problem($Cname ,$Pname )
    {
      $Cname = str_replace("_", " ", $Cname);
      $Pname = str_replace("_", " ", $Pname);

      $contest = Contest::with('languages')->where('name', $Cname)->where('status','=',1)->firstOrFail();
      $problem = Problem::where('name', $Pname)->firstOrFail();

      if(($contest) && ($problem))
      {
        
          return view('competitions.problem')
          ->with('contest', $contest)
          ->with('problem',$problem);
  
      }//cin't find Contest && problem
      else{abort(404);}
        




    }
}
