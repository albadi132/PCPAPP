<?php

namespace App\Http\Controllers\competitions;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use App\Models\Contest;
use App\Models\ContestUser;
use App\Models\ContestTeam;
use App\Models\TeamUser;
use App\Models\Team;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Auth;


class Subscription extends Controller
{
    public function registration(Request $request)
    {

        $this->validate(
            $request,
            [
                'participant.*.email' => ['required', 'string', 'email', 'max:255'],
                'contestid' => ['required'],
            ],
            [
                'participant.*.email.required'    => 'Please Provide Email Address',
                'participant.*.email.string'      => 'Please Provide Email Address',
                'participant.*.email.email' => 'Please Provide Email Address',
                'participant.*.email.max:255'      => 'Email Address cant be more than 255 charcater',
            ]
        );



        //Check the permissions
        if (Gate::allows('OrganizerOrAdmin', $request->contestid)) {

            //Make sure of the competition

                //Check emails
                $dataSet = [];
                foreach ($request->participant as $sup) {

                    $user = User::where('email', $sup['email'])->first();


                    if (!is_null($user)) {
                        //check if sup before
                        if ($this->IsNotSubscribe($request->contestid, $user->id)) {
                            $dataSet[] = [
                                'user_id'  => $user->id,
                                'contest_id'    => $request->contestid,
                                'role'       => 'competitor',
                                'created_at' =>  \Carbon\Carbon::now(), # new \Datetime()
                                'updated_at' => \Carbon\Carbon::now(),  # new \Datetime()
                            ];
                        } else {
                            return [
                                'status' => 402,
                                'description' => "There is an error, This email is " . $sup['email'] . " already registered in the competition",
                            ];
                        }
                    } else {
                        return [
                            'status' => 402,
                            'description' => "There is an error, make sure that this email " . $sup['email'] . " is linked to an account",
                        ];
                    }
                }

                //All Done
                $saved = DB::table('contest_user')->insert($dataSet);
                if ($saved) {
                    return [
                        'status' => 200,
                        'description' => "Competitors have been successfully registered",
                    ];
                } else {
                    return [
                        'status' => 404,
                        'description' => "Something went wrong!!",
                    ];
                }
           
        } else {
            return [

                'status' => 401,
                'description' => "You do not have permission to add participants",
            ];
        }
    }


    public function subscribe($name, $id)
    {
        //dd($name,$userid);

        //check if user exist auth
        if (!is_null(Auth::user())) {
            //check if sup is open
            
            if ($this->RegistrationIsOpen($id)) {

                //check if sup is not privet
                if ($this->ContestStatus($id)) {

                    //check if sup before
                    $userid = Auth::user()->id;


                    if ($this->IsNotSubscribe($id, $userid)) {

                        //all Done
                        $competitor = new ContestUser;
                        $competitor->user_id = $userid;
                        $competitor->contest_id = $id;
                        $competitor->role = 'competitor';
                        $competitor->save();
                        return redirect()->route('competition', ['name' => $name])->with(session()->flash('alert-success', 'Successful subscription, good luck.'));
                    } else {
                        return redirect()->route('competition', ['name' => $name])->with(session()->flash('alert-danger', 'You are already registered in the competition.'));
                    }
                } else {
                    return redirect()->route('competition', ['name' => $name])->with(session()->flash('alert-danger', 'This contest is private, ask the organizers to register.'));
                }
            } else {
                return redirect()->route('competition', ['name' => $name])->with(session()->flash('alert-danger', 'Something went wrong!!'));
            }



            //check if sup is not privet

        } else {
            return redirect()->route('competition', ['name' => $name])->with(session()->flash('alert-danger', 'You need to log in first to subscribe in the contest.'));
        }
    }
    public function unsubscribe($name, $id)
    {
        $user = Auth::user();
        if (!is_null($user)) {
            //check if sup is open
            if ($this->RegistrationIsOpen($id)) {
                $contest = Contest::with('teams')->find($id);
                //check if sup is not privet
                if ($this->ContestStatus($contest->id)) {
                    if (!$this->IsNotSubscribe($contest->id, $user->id)) {

                        if ($contest->participation == 'solo') {
                            ContestUser::where('user_id', $user->id)->where('contest_id', $contest->id)->delete();
                        } else {
                            //if leader
                            $leader = FALSE;
                            $teamid = null;

                            //get all team on comp


                            foreach ($contest->teams as $team) {
                                if ($team->leader == $user->username) {
                                    $leader = True;
                                    $teamid = $team->id;
                                }
                            }

                            if ($leader) {

                                ContestTeam::where("team_id", $teamid)->delete();
                                TeamUser::where("team_id", $teamid)->delete();
                                Team::find($teamid)->delete();
                                ContestUser::where('user_id', $user->id)->where('contest_id', $contest->id)->delete();
                            } else {

                                foreach ($contest->teams as $team) {
                                    $teamwithuser = [];
                                    $part = array();
                                    $teamwithuser[] = Team::with('users')->where('id', $team->id)->first();
                                    foreach ($team->users as $users) {
                                        array_push($part, $users->username);
                                    }
                                    if (in_array($user->username, $part)) {
                                        TeamUser::where("team_id", $team->id)->where('user_id', $user->id)->delete();
                                    }
                                }
                                ContestUser::where('user_id', $user->id)->where('contest_id', $contest->id)->delete();
                            }
                        }
                        return redirect()->route('competition', ['name' => $name])->with(session()->flash('alert-success', 'Successful unsubscription.'));
                    } else {
                        return redirect()->route('competition', ['name' => $name])->with(session()->flash('alert-danger', 'You are not registered in the competition.'));
                    }
                } else {
                    return redirect()->route('competition', ['name' => $name])->with(session()->flash('alert-danger', 'This contest is private, ask the organizers to unsubscribe.'));
                }
            } else {
                return redirect()->route('competition', ['name' => $name])->with(session()->flash('alert-danger', 'Something went wrong!!'));
            }
        } else {
            return redirect()->route('competition', ['name' => $name])->with(session()->flash('alert-danger', 'You need to log in first to unsubscribe in the contest.'));
        }
    }


    public function RegistrationIsOpen($id)
    {
        $contest = Contest::find($id);
        if (!is_null($contest)) {
            if (($contest->starting_date > date('Y-m-d H:i:s')) && ($contest->status == 1)) {

                return True;
            } 
            elseif($contest->opentime)
            {
                return True;
            }
            else
                return FALSE;
        } else {
            return FALSE;
        }
    }
    public function ContestStatus($id)
    {
        $contest = Contest::find($id);

        if ($contest->type == 'private') {
            return FALSE;
        } else
            return TRUE;
    }

    public function IsNotSubscribe($id, $userid)
    {
        $contestuser = ContestUser::where('user_id', $userid)->where('contest_id', $id)->first();

        if (is_null($contestuser))
            return TRUE;
        else
            return FALSE;
    }
}
