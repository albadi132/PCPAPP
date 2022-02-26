<?php

namespace App\Http\Controllers\judge;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Contest;
use App\Models\Team;
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
use phpDocumentor\Reflection\PseudoTypes\True_;
use Symfony\Component\Process\Exception\ProcessFailedException;
use Symfony\Component\Process\Process;
use Symfony\Component\Process\InputStream;

class JudgeController extends Controller
{
    public function JudgeSystem(Request $request, $copname, $proname)
    {



        //change this
        $SystemPath = '/var/www/pcp/public/';
        //$SystemPath = '/home/albadi/Desktop/PCP/public/';


        $Cname = str_replace("_", " ", $copname);
        $Pname = str_replace("_", " ", $proname);


        $this->validate($request, [
            'code' => ['required', 'file', 'max:1024'],
            'language' => ['required'],
        ]);


        //pring prob and contestt data
        $contest = Contest::with('teams')->where('name', $Cname)->where('status', '=', 1)->firstOrFail();
        $problem = Problem::with('Testcases')->where('name', $Pname)->firstOrFail();

        //dd(!empty($problem->Testcases->count()),$problem->Testcases);
        $user = Auth::user();
        //check if all exsit
        if (($contest) && ($problem)) {

            //did tthe user partspate
            if ($this->IsSubscribe($contest, $user->id)) {

                //conttestt is online
                if ($this->SubmittingIsOpen($contest->id)) {
                    //
                    if (!$this->HasQuestionSolvBefore($contest, $problem->id, $user->id)) {

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
                                            $command = 'unshare -r -n /usr/bin/python3 -m py_compile ' . $path;


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
                                                    try {
                                                        $process = new Process(['unshare', '-r', '-n', 'python3', $path, 'memory_limit=10M']);
                                                        $process->setTimeout($testcase->timelimit / 60);
                                                        $process->setInput($testcase->input);
                                                        $process->run();
                                                        // dd($process);
                                                    } catch (\Exception $e) {
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
                                                    }



                                                    // executes after the command finishes
                                                    if ($process->isSuccessful()) {

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

                                            $command = 'unshare -r -n /usr/bin/g++ -o ' . $path1 . ' ' . $path2;

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

                                                    try {
                                                        $process = new Process(['unshare', '-r', '-n', $path1, 'memory_limit=10M']);
                                                        $process->setTimeout($testcase->timelimit / 60);
                                                        $process->setInput($testcase->input);
                                                        $process->run();
                                                    } catch (\Exception $e) {
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
                                                    }



                                                    // executes after the command finishes
                                                    if ($process->isSuccessful()) {

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
                        //
                    } else {
                        return back()->with(session()->flash('alert-danger', 'This question was solved before'));
                    }
                } else {

                    return back()->with(session()->flash('alert-danger', 'Answers cannot be submited for this contest'));
                }
            } else {
                if ($contest->participation == 'solo') {
                    return back()->with(session()->flash('alert-danger', 'You are not subscribe in this competition'));
                } else {
                    return back()->with(session()->flash('alert-danger', 'You are not subscribe or you have not joined a team in this competition'));
                }
            }
        } else {
            return back()->with(session()->flash('alert-danger', 'Something went wrong!!'));
        }
    }

    public function manualjudge(Request $request)
    {
        $this->validate($request, [
            'problem' => ['required', 'integer'],
            'languages' => ['required', 'integer'],
            'competitor' => ['required', 'integer'],
            'contestid' => ['required', 'integer'],
        ]);


        $contest = Contest::find($request->contestid);

        if ($contest) {
            if (Gate::allows('OrganizerOrAdmin', $contest->id)) {


                if ($this->IsSubscribe($contest, $request->competitor)) {


                    //problem on compettation
                    if ($this->QuestionInCompetition($contest->id, $request->problem)) {
                        $problem = Problem::find($request->problem);

                        if (!$this->HasQuestionSolvBefore($contest, $problem->id, $request->competitor)) {
                            //langeg on compettation

                            if ($this->LanguageInCompetition($contest->id, $request->languages)) {

                                $SubmissionsLog = new SubmissionsLog;
                                $SubmissionsLog->file = 'MANUAL JUDGE';
                                $SubmissionsLog->result = 'pass';
                                $SubmissionsLog->save();
                                $this->SubmissionForContest($SubmissionsLog->id, $contest->id);
                                $this->SubmissionForProblem($SubmissionsLog->id, $problem->id);
                                $this->SubmissionForUser($SubmissionsLog->id, $request->competitor);
                                $this->SubmissionForLanguage($SubmissionsLog->id, $request->languages);

                                //score
                                $Score = new Score;
                                $Score->points = $problem->points;
                                $Score->user_id =  $request->competitor;
                                $Score->contest_id =  $contest->id;
                                $Score->problem_id =  $problem->id;
                                $Score->language_id = $request->languages;
                                $Score->submissionlog_id = $SubmissionsLog->id;
                                $Score->save();

                                return [
                                    'status' => 200,
                                    'description' => "Team have been successfully Created",
                                ];
                            } else {
                                return [

                                    'status' => 401,
                                    'description' => "This language is not supported in contest",
                                ];
                            }
                        } else {
                            return [

                                'status' => 401,
                                'description' => "This question was solved before",
                            ];
                        }
                    } else {
                        return [

                            'status' => 401,
                            'description' => "This problem does not exist in contest",
                        ];
                    }
                } else {
                    if ($contest->participation == 'solo') {
                        return [

                            'status' => 401,
                            'description' => "This competitor in not subscribe in this competition",
                        ];
                    } else {
                        return [

                            'status' => 401,
                            'description' => "This competitor is not subscribe or not joined a team in this competition",
                        ];
                    }
                }
            } else {

                return [

                    'status' => 401,
                    'description' => "You do not have permission to add participants",
                ];
            }
        } else {
            return [
                'status' => 402,
                'description' => "Sorry, There is an error!!",
            ];
        }
    }


    public function SubmittingIsOpen($id)
    {
        $contest = Contest::find($id);
        if (!is_null($contest)) {
            if (($contest->starting_date < date('Y-m-d H:i:s')) && ($contest->ending_date > date('Y-m-d H:i:s')) && ($contest->status == 1)) {
                return True;
            } elseif (($contest->opentime) && ($contest->starting_date < date('Y-m-d H:i:s'))) {
                return True;
            } else {
                //change this
                return FALSE;
            }
        } else {
            return FALSE;
        }
    }

    public function IsSubscribe($comp, $userid)
    {

        $contest = $comp;

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

    public function HasQuestionSolvBefore($comp, $probid, $userid)
    {
        $contest = $comp;

        if ($contest->participation == 'solo') {
            $score = Score::where('user_id', $userid)->where('contest_id', $contest->id)->where('problem_id', $probid)->first();
            if (!is_null($score))
                //change this
                return TRUE;
            else
                return FALSE;
        } else {
            foreach ($contest->teams as $team) {
                $users = Team::with('users')->find($team->id);

                foreach ($users->users as $user) {
                    if ($user->id == $userid) {
                        foreach ($users->users as $user) {
                            $score = Score::where('user_id', $user->id)->where('contest_id', $contest->id)->where('problem_id', $probid)->first();
                            if (!is_null($score)) {
                                //change this
                                return TRUE;
                            }
                        }

                        return FALSE;
                    }
                }
            }
        }
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
