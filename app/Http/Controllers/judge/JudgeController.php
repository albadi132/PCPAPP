<?php

namespace App\Http\Controllers\judge;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Contest;
use App\Models\Problem;
use App\Models\ContestUser;
use App\Models\ContestProblem;
use App\Models\ContestLanguage;
use App\Models\Language;
use App\Models\Score;
use App\Models\SubmissionsLog;
use App\Models\ExecutionsLog;
use App\Models\ExecutionlogSubmissionlog;
use App\Models\LanguageSubmissionlog;
use App\Models\SubmissionlogUser;
use App\Models\ProblemSubmissionlog;
use App\Models\ContestSubmissionlog;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use Symfony\Component\Process\Exception\ProcessFailedException;
use Symfony\Component\Process\Process;
use Symfony\Component\Process\InputStream;

class JudgeController extends Controller
{
    public function JudgeSystem(Request $request, $copname, $proname)
    {



        //change this
        $SystemPath = '/home/albadi/Desktop/PCP/public/';
        ///


        $Cname = str_replace("_", " ", $copname);
        $Pname = str_replace("_", " ", $proname);


        $this->validate($request, [
            'code' => ['required', 'file', 'max:1024'],
            'language' => ['required'],
        ]);


        //pring prob and contestt data
        $contest = Contest::where('name', $Cname)->where('status', '=', 1)->firstOrFail();
        $problem = Problem::with('Testcases')->where('name', $Pname)->firstOrFail();

        //dd(!empty($problem->Testcases->count()),$problem->Testcases);
        $user = Auth::user();
        //check if all exsit
        if (($contest) && ($problem)) {

            //did tthe user partspate
            if ($this->IsSubscribe($contest->id, $user->id)) {

                //conttestt is online
                if ($this->SubmittingIsOpen($contest->id)) {

                    //problem on compettation 
                    if ($this->QuestionInCompetition($contest->id, $problem->id)) {

                        //langeg on compettation 
                        if ($this->LanguageInCompetition($contest->id, $request->language)) {
                            $Language = Language::find($request->language);


                            //problme has test case
                            if (!empty($problem->Testcases->count())) {

                                //switch case

                                switch ($Language->id) {
                                    case 1:
                                        //python
                                        $submit = time();
                                        $NewSubmitName = $proname . '_' . $submit . '.py';
                                        $NewPath = 'contests/code/' . $copname . '/' . $Language->dir . '/' . $submit . '/';

                                        $request->code->move(public_path($NewPath), $NewSubmitName);

                                        $path = $SystemPath . $NewPath . $NewSubmitName;
                                        $command = '/usr/bin/python3 -m py_compile ' . $path;


                                        $output = null;
                                        $failed = 0;
                                        $passtest = 0;
                                        $reson = null;

                                        exec($command . " 2>&1", $output);

                                        if (empty($output)) {

                                            //start subbmisson log
                                            $SubmissionsLog = new SubmissionsLog;
                                            $SubmissionsLog->file = $NewSubmitName;
                                            $SubmissionsLog->result = 'unknown';
                                            $SubmissionsLog->save();
                                            $this->SubmissionForContest($SubmissionsLog->id, $contest->id);
                                            $this->SubmissionForProblem($SubmissionsLog->id, $problem->id);
                                            $this->SubmissionForUser($SubmissionsLog->id, $user->id);
                                            $this->SubmissionForLanguage($SubmissionsLog->id, $Language->id);



                                            foreach ($problem->Testcases as $testcase) {
                                                //dd($testcase->input);

                                                $process = new Process(['python3', $path]);
                                                $process->setInput($testcase->input);
                                                $process->run();

                                                // executes after the command finishes
                                                if (!$process->isSuccessful()) {
                                                    //Time out
                                                    $error = json_encode(new ProcessFailedException($process));

                                                    $ExecutionsLog = new ExecutionsLog;
                                                    $ExecutionsLog->output = $error;
                                                    $ExecutionsLog->result = "Time out";
                                                    $ExecutionsLog->testcase_id = $testcase->id;
                                                    $ExecutionsLog->save();
                                                    $this->SubmissionForExecutions($SubmissionsLog->id, $ExecutionsLog->id);

                                                    $failed = 1;
                                                    $passtest = 0;
                                                    $reson = "Time out";
                                                } else {

                                                    $Result = str_replace(array("\n", "\r"), '', $process->getOutput());
                                                    $Expected = str_replace(array("\n", "\r"), '', $testcase->output);
                                                    if ($Result == $Expected) {
                                                        //pass
                                                        $ExecutionsLog = new ExecutionsLog;
                                                        $ExecutionsLog->output = $process->getOutput();
                                                        $ExecutionsLog->result = "pass";
                                                        $ExecutionsLog->status = 1;
                                                        $ExecutionsLog->testcase_id = $testcase->id;
                                                        $ExecutionsLog->save();
                                                        $this->SubmissionForExecutions($SubmissionsLog->id, $ExecutionsLog->id);
                                                        if ($failed != 1) {
                                                            $passtest = 1;
                                                        }
                                                    } else {
                                                        //fail

                                                        $ExecutionsLog = new ExecutionsLog;
                                                        $ExecutionsLog->output = $process->getOutput();
                                                        $ExecutionsLog->result = "fail";
                                                        $ExecutionsLog->testcase_id = $testcase->id;
                                                        $ExecutionsLog->save();
                                                        $this->SubmissionForExecutions($SubmissionsLog->id, $ExecutionsLog->id);

                                                        $failed = 1;
                                                        $passtest = 0;
                                                        $reson = "Not expected result";
                                                    }
                                                }
                                            }
                                            //user return

                                            if ($passtest == 1) {

                                                $SubmissionsLog->result = "pass";
                                                $SubmissionsLog->status = 1;
                                                $SubmissionsLog->save();

                                                //score
                                                $Score = new Score;
                                                $Score->points = $problem->points;
                                                $Score->user_id =  $user->id;
                                                $Score->contest_id =  $contest->id;
                                                $Score->problem_id =  $problem->id;
                                                $Score->language_id = $Language->id;
                                                $Score->submissionlog_id = $SubmissionsLog->id;
                                                $Score->save();

                                                return back()->with(session()->flash('judge-success', 'The solution has been accepted'));
                                            } else {
                                                $SubmissionsLog->result = $reson;
                                                $SubmissionsLog->status = 0;
                                                $SubmissionsLog->save();
                                                return back()->with(session()->flash('judge-danger', 'The solution was not accepted due to: ' . $reson));
                                            }
                                        } else {
                                            //SyntaxError

                                            $SubmissionsLog = new SubmissionsLog;
                                            $SubmissionsLog->file = $NewSubmitName;
                                            $SubmissionsLog->result = 'Syntax Error';
                                            $SubmissionsLog->save();
                                            $this->SubmissionForContest($SubmissionsLog->id, $contest->id);
                                            $this->SubmissionForProblem($SubmissionsLog->id, $problem->id);
                                            $this->SubmissionForUser($SubmissionsLog->id, $user->id);
                                            $this->SubmissionForLanguage($SubmissionsLog->id, $Language->id);

                                            return back()->with(session()->flash('judge-danger', 'The solution was not accepted due to: Syntax Error'));
                                        }

                                        break;
                                    case 2:
                                        //c++

                                        $submit = time();
                                        $NewSubmitName = $proname . '_' . $submit . '.cpp';
                                        $NewCompilerName = $proname . '_' . $submit;
                                        $NewPath = 'contests/code/' . $copname . '/' . $Language->dir . '/' . $submit . '/';

                                        $request->code->move(public_path($NewPath), $NewSubmitName);

                                        $path1 = $SystemPath . $NewPath . $NewCompilerName;
                                        $path2 = $SystemPath . $NewPath . $NewSubmitName;

                                        $command = '/usr/bin/g++ -o ' . $path1 . ' ' . $path2;

                                        $output = null;
                                        $failed = 0;
                                        $passtest = 0;
                                        $reson = null;

                                        exec($command . " 2>&1", $output);
                                        

                                        if (empty($output)) {

                                            //start subbmisson log
                                            $SubmissionsLog = new SubmissionsLog;
                                            $SubmissionsLog->file = $NewSubmitName;
                                            $SubmissionsLog->result = 'unknown';
                                            $SubmissionsLog->save();
                                            $this->SubmissionForContest($SubmissionsLog->id, $contest->id);
                                            $this->SubmissionForProblem($SubmissionsLog->id, $problem->id);
                                            $this->SubmissionForUser($SubmissionsLog->id, $user->id);
                                            $this->SubmissionForLanguage($SubmissionsLog->id, $Language->id);



                                            foreach ($problem->Testcases as $testcase) {
                                                //dd($testcase->input);

                                                $process = new Process([$path1]);
                                                $process->setInput($testcase->input);
                                                $process->run();

                                                // executes after the command finishes
                                                if (!$process->isSuccessful()) {
                                                    //Time out
                                                    $error = json_encode(new ProcessFailedException($process));

                                                    $ExecutionsLog = new ExecutionsLog;
                                                    $ExecutionsLog->output = $error;
                                                    $ExecutionsLog->result = "Time out";
                                                    $ExecutionsLog->testcase_id = $testcase->id;
                                                    $ExecutionsLog->save();
                                                    $this->SubmissionForExecutions($SubmissionsLog->id, $ExecutionsLog->id);

                                                    $failed = 1;
                                                    $passtest = 0;
                                                    $reson = "Time out";
                                                } else {

                                                    $Result = str_replace(array("\n", "\r"), '', $process->getOutput());
                                                    $Expected = str_replace(array("\n", "\r"), '', $testcase->output);
                                                    if ($Result == $Expected) {
                                                        //pass
                                                        $ExecutionsLog = new ExecutionsLog;
                                                        $ExecutionsLog->output = $process->getOutput();
                                                        $ExecutionsLog->result = "pass";
                                                        $ExecutionsLog->status = 1;
                                                        $ExecutionsLog->testcase_id = $testcase->id;
                                                        $ExecutionsLog->save();
                                                        $this->SubmissionForExecutions($SubmissionsLog->id, $ExecutionsLog->id);
                                                        if ($failed != 1) {
                                                            $passtest = 1;
                                                        }
                                                    } else {
                                                        //fail

                                                        $ExecutionsLog = new ExecutionsLog;
                                                        $ExecutionsLog->output = $process->getOutput();
                                                        $ExecutionsLog->result = "fail";
                                                        $ExecutionsLog->testcase_id = $testcase->id;
                                                        $ExecutionsLog->save();
                                                        $this->SubmissionForExecutions($SubmissionsLog->id, $ExecutionsLog->id);

                                                        $failed = 1;
                                                        $passtest = 0;
                                                        $reson = "Not expected result";
                                                    }
                                                }
                                            }
                                            //user return

                                            if ($passtest == 1) {

                                                $SubmissionsLog->result = "pass";
                                                $SubmissionsLog->status = 1;
                                                $SubmissionsLog->save();

                                                //score
                                                $Score = new Score;
                                                $Score->points = $problem->points;
                                                $Score->user_id =  $user->id;
                                                $Score->contest_id =  $contest->id;
                                                $Score->problem_id =  $problem->id;
                                                $Score->language_id = $Language->id;
                                                $Score->submissionlog_id = $SubmissionsLog->id;
                                                $Score->save();

                                                return back()->with(session()->flash('judge-success', 'The solution has been accepted'));
                                            } else {
                                                $SubmissionsLog->result = $reson;
                                                $SubmissionsLog->status = 0;
                                                $SubmissionsLog->save();
                                                return back()->with(session()->flash('judge-danger', 'The solution was not accepted due to: ' . $reson));
                                            }
                                        } else {
                                            //SyntaxError

                                            $SubmissionsLog = new SubmissionsLog;
                                            $SubmissionsLog->file = $NewSubmitName;
                                            $SubmissionsLog->result = 'Syntax Error';
                                            $SubmissionsLog->save();
                                            $this->SubmissionForContest($SubmissionsLog->id, $contest->id);
                                            $this->SubmissionForProblem($SubmissionsLog->id, $problem->id);
                                            $this->SubmissionForUser($SubmissionsLog->id, $user->id);
                                            $this->SubmissionForLanguage($SubmissionsLog->id, $Language->id);

                                            return back()->with(session()->flash('judge-danger', 'The solution was not accepted due to: Syntax Error'));
                                        }

                                        break;

                                    default:
                                        return back()->with(session()->flash('alert-danger', 'There are no instructions for this language yet'));
                                        break;
                                }
                            } else {

                                return back()->with(session()->flash('alert-danger', 'Cannot test the solution, contact the organizer'));
                            }
                        } else {

                            return back()->with(session()->flash('alert-danger', 'This language is not supported in contest'));
                        }
                    } else {

                        return back()->with(session()->flash('alert-danger', 'This problem does not exist in contest'));
                    }
                } else {

                    return back()->with(session()->flash('alert-danger', 'Answers cannot be submited for this contest'));
                }
            } else {
                return back()->with(session()->flash('alert-danger', 'You are not subscribe in this competition'));
            }
        } else {
            return back()->with(session()->flash('alert-danger', 'Something went wrong!!'));
        }


        dd($request, $Cname, $Pname);
    }


    public function SubmittingIsOpen($id)
    {
        $contest = Contest::find($id);
        if (!is_null($contest)) {
            if (($contest->starting_date < date('Y-m-d H:i:s')) && ($contest->ending_date > date('Y-m-d H:i:s')) && ($contest->status == 1)) {
                return True;
            } else {
                //change this
                return True;
            }
        } else {
            return FALSE;
        }
    }

    public function IsSubscribe($id, $userid)
    {
        $contestuser = ContestUser::where('user_id', $userid)->where('contest_id', $id)->first();

        if (!is_null($contestuser))
            return TRUE;
        else
            return FALSE;
    }

    public function QuestionInCompetition($compid, $probid)
    {
        $ContestProblem = ContestProblem::where('problem_id', $probid)->where('contest_id', $compid)->first();
        if (!is_null($ContestProblem))
            return TRUE;
        else
            return FALSE;
    }
    public function LanguageInCompetition($compid, $langid)
    {
        $ContestLanguage = ContestLanguage::where('language_id', $langid)->where('contest_id', $compid)->first();
        if (!is_null($ContestLanguage))
            return TRUE;
        else
            return FALSE;
    }

    public function SubmissionForContest($SubmissionsLog, $contest)
    {
        $ContestSubmissionlog = new ContestSubmissionlog;
        $ContestSubmissionlog->submissionlog_id = $SubmissionsLog;
        $ContestSubmissionlog->contest_id = $contest;
        $ContestSubmissionlog->timestamps  = false;
        $ContestSubmissionlog->save();
    }
    public function SubmissionForProblem($SubmissionsLog, $problem)
    {
        $ProblemSubmissionlog = new ProblemSubmissionlog;
        $ProblemSubmissionlog->submissionlog_id = $SubmissionsLog;
        $ProblemSubmissionlog->problem_id = $problem;
        $ProblemSubmissionlog->timestamps  = false;
        $ProblemSubmissionlog->save();
    }
    public function SubmissionForUser($SubmissionsLog, $User)
    {
        $SubmissionlogUser = new SubmissionlogUser;
        $SubmissionlogUser->submissionlog_id = $SubmissionsLog;
        $SubmissionlogUser->user_id = $User;
        $SubmissionlogUser->timestamps  = false;
        $SubmissionlogUser->save();
    }
    public function SubmissionForLanguage($SubmissionsLog, $language)
    {
        $LanguageSubmissionlog = new LanguageSubmissionlog;
        $LanguageSubmissionlog->submissionlog_id = $SubmissionsLog;
        $LanguageSubmissionlog->language_id = $language;
        $LanguageSubmissionlog->timestamps  = false;
        $LanguageSubmissionlog->save();
    }
    public function SubmissionForExecutions($SubmissionsLog, $executions)
    {
        $ExecutionlogSubmissionlog = new ExecutionlogSubmissionlog;
        $ExecutionlogSubmissionlog->submissionlog_id = $SubmissionsLog;
        $ExecutionlogSubmissionlog->executionlog_id = $executions;
        $ExecutionlogSubmissionlog->timestamps  = false;
        $ExecutionlogSubmissionlog->save();
    }
}
