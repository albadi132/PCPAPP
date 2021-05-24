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

    $contest = Contest::with('languages')->where('name', $Cname)->where('status', '=', 1)->firstOrFail();
    $problem = Problem::where('name', $Pname)->firstOrFail();

    if (($contest) && ($problem)) {

      return view('competitions.problem')
        ->with('contest', $contest)
        ->with('problem', $problem);
    } //cin't find Contest && problem
    else {
      abort(404);
    }
  }

  
  public function testcplus(Request $request)
  {


    $time = time();
    $newCodeName = $time . '.cpp';
    $newPath = 'contests/code/' . $time . '/';

    $CodeName = $time;
    $request->code->move(public_path($newPath), $newCodeName);

    $path1 = '/home/albadi/Desktop/PCP/public/' . $newPath . $CodeName;
    $path2 = '/home/albadi/Desktop/PCP/public/' . $newPath . $newCodeName;

    $com = '/usr/bin/g++ -o ' . $path1 . ' ' . $path2;

    $output = null;
    exec($com . " 2>&1", $output);

    if (empty($output)) {


      $Problem = Problem::with('Testcases')->where('id', 2)->first();
      foreach ($Problem->Testcases as $testcase) {
        //dd($testcase->input);

        $process = new Process([$path1]);
        $process->setInput($testcase->input);
        $process->run();

        // executes after the command finishes
        if (!$process->isSuccessful()) {
          dd(new ProcessFailedException($process));
        }
        $text1 = str_replace(array("\n", "\r"), '', $process->getOutput());
        $text2 = str_replace(array("\n", "\r"), '', $testcase->output);
        dd($text1 == $text2);
      }
    } else {

      //return error
      dd($output);
    }


    //$process->setInput("3 2 2 1");
    $process = new Process(['/usr/bin/g++', '-o', 'contests/code/1621606452/1621606452', 'contests/code/1621606452/1621606452.cpp']);
    $process->run();

    // executes after the command finishes
    if (!$process->isSuccessful()) {
      dd(new ProcessFailedException($process));
    }

    dd($process->getOutput());

    //$process = new Process(['g++ -o /home/albadi/Desktop/PCP/public/contests/code/1621606452/1621606452 /home/albadi/Desktop/PCP/public/contests/code/1621606452/1621606452.cpp']);
    //$process->setInput("3 2 salim ali");
    //$process->run();

    // ... do other things

  }

  public function testpy(Request $request)
  {

    $time = time();
    $newCodeName = $time . '.py';
    $newPath = 'contests/code/' . $time . '/';

    $CodeName = $time;
    $request->code->move(public_path($newPath), $newCodeName);

    $path = '/home/albadi/Desktop/PCP/public/' . $newPath . $newCodeName;
    $com = '/usr/bin/python3 -m py_compile ' . $path;

    //dd($com);

    $output = null;
    exec($com . " 2>&1", $output);

    if (empty($output)) {


      $Problem = Problem::with('Testcases')->where('id', 2)->first();
      foreach ($Problem->Testcases as $testcase) {
        //dd($testcase->input);

        $process = new Process(['python3', $path]);
        $process->setInput($testcase->input);
        $process->run();

        // executes after the command finishes
        if (!$process->isSuccessful()) {
          dd(new ProcessFailedException($process));
        }
        $text1 = str_replace(array("\n", "\r"), '', $process->getOutput());
        $text2 = str_replace(array("\n", "\r"), '', $testcase->output);
        dd($text1, $text2);
      }
    } else {

      //return error
      dd($output);
    }
  }



}
