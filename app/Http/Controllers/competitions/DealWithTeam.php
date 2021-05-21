<?php

namespace App\Http\Controllers\competitions;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Contest;
use App\Models\ContestUser;
use App\Models\Team;
use App\Models\ContestTeam;
use App\Models\TeamUser;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Auth;

class DealWithTeam extends Controller
{
    //
    //creat team request
    public function CreatNewTeam(Request $request)
    {

        $this->validate($request, [
            'name' => ['required', 'string', 'max:255'],
            'contestid' => ['required'],
        ]);


        //check if user exsite
        $user = Auth::user();
        if (!is_null($user)) {

            //check if competions exsite && open && team
            if ($this->RegistrationIsOpen($request->contestid)) {
                //check if user sup

                if ($this->IsSubscribe($request->contestid, $user->id)) {

                    //check if there is no team with same name on same competion
                    if (!$this->IsNameTaken($request->contestid, $request->name)) {
                        //check if you are in team
                        if (!$this->DoYouHaveTeam($request->contestid, $user->id)) {

                            //all Done

                            //creat team
                            $team = new Team;
                            $team->name = $request->name;
                            $team->leader = $user->username;
                            $save =  $team->save();

                            if ($save) {

                                //registter team to comp
                                $teamtocomp = new ContestTeam;
                                $teamtocomp->team_id = $team->id;
                                $teamtocomp->contest_id = $request->contestid;
                                $teamtocomp->timestamps  = false;

                                //register user to team
                                $usertoteam = new TeamUser;
                                $usertoteam->team_id = $team->id;
                                $usertoteam->user_id = $user->id;
                                $usertoteam->timestamps  = false;
                                $teamtocomp->save();
                                $usertoteam->save();

                                return [
                                    'status' => 200,
                                    'description' => "Team have been successfully Created",
                                ];
                            } else {
                                return [
                                    'status' => 404,
                                    'description' => "Something went wrong!!",
                                ];
                            }
                        } else {
                            return [
                                'status' => 404,
                                'description' => "You are already registered in a team.",
                            ];
                        }
                    } else {
                        return [
                            'status' => 404,
                            'description' => "This name is already taken.",
                        ];
                    }
                } else {
                    return [
                        'status' => 404,
                        'description' => "Subscribe in the competition first.",
                    ];
                }
            } else {
                return [
                    'status' => 404,
                    'description' => "Something went wrong!!",
                ];
            }
        } else {

            return [
                'status' => 402,
                'description' => "Sorry, There is an error!!",
            ];
        }
    }

    public function deleteteam($name, $id)
    {

        $contestname = str_replace("_", " ", $name);
        $contest = Contest::where('name', $contestname)->where('status', '=', 1)->first();
        if (!is_null($contest)) {

            //comp time
            if ($this->RegistrationIsOpen($contest->id)) {
                //are you admin
                if (Gate::allows('OrganizerOrAdmin', $contest->id)) {
                    $team = Team::find($id);

                    if (!is_null($team)) {
                        if ($this->TeamRemove($team->id)) {
                            return redirect()->route('UserTeams', ['name' => $name])->with(session()->flash('alert-success', 'Team has been successfully deleted.'));
                        } else {
                            return redirect()->route('UserTeams', ['name' => $name])->with(session()->flash('alert-danger', 'Something went wrong!!'));
                        }
                    } else {
                        return redirect()->route('UserTeams', ['name' => $name])->with(session()->flash('alert-danger', 'Something went wrong!!'));
                    }
                } else {
                    //are you the leader
                    $team = Team::find($id);

                    if (!is_null($team)) {
                        if ($team->leader == Auth::user()->username) {
                            if ($this->TeamRemove($team->id)) {
                                return redirect()->route('UserTeams', ['name' => $name])->with(session()->flash('alert-success', 'Team has been successfully deleted.'));
                            } else {
                                return redirect()->route('UserTeams', ['name' => $name])->with(session()->flash('alert-danger', 'Something went wrong!!'));
                            }
                        } else {
                            return redirect()->route('UserTeams', ['name' => $name])->with(session()->flash('alert-danger', 'You do not have permission to delete the team.'));
                        }
                    } else {
                        return redirect()->route('UserTeams', ['name' => $name])->with(session()->flash('alert-danger', 'Something went wrong!!'));
                    }
                }
            } else {
                return redirect()->route('UserTeams', ['name' => $name])->with(session()->flash('alert-danger', 'The team cannot be deleted, the competition has already started'));
            }
        } else {

            return redirect()->route('UserTeams', ['name' => $name])->with(session()->flash('alert-danger', 'Something went wrong!!'));
        }
    }

    public function joiningtteam($name, $id)
    {
        $contestname = str_replace("_", " ", $name);
        $contest = Contest::where('name', $contestname)->where('status', '=', 1)->first();
        if (!is_null($contest)) {
            //comp time
            if ($this->RegistrationIsOpen($contest->id)) {

                //check if you have team
                $user = Auth::user();
                if (!$this->DoYouHaveTeam($contest->id, $user->id)) {


                    //check if team exsit
                    $team = Team::find($id);
                    if (!is_null($team)) {
                        //check if team is full
                        $count = TeamUser::where('team_id', $id)->count();
                        if ($count < 4) {
                            //All done
                            $usertoteam = new TeamUser;
                            $usertoteam->team_id = $id;
                            $usertoteam->user_id = $user->id;
                            $usertoteam->timestamps  = false;
                            $usertoteam->save();


                            return redirect()->route('UserTeams', ['name' => $name])->with(session()->flash('alert-success', 'You have successfully joined the team'));
                        } else {
                            return redirect()->route('UserTeams', ['name' => $name])->with(session()->flash('alert-danger', 'team is full'));
                        }
                    } else {
                        return redirect()->route('UserTeams', ['name' => $name])->with(session()->flash('alert-danger', 'Something went wrong!!'));
                    }
                } else {
                    return redirect()->route('UserTeams', ['name' => $name])->with(session()->flash('alert-danger', 'You are already registered in a team.'));
                }
            } else {
                return redirect()->route('UserTeams', ['name' => $name])->with(session()->flash('alert-danger', 'Can not join team, the competition has already started'));
            }
        } else {
            return redirect()->route('UserTeams', ['name' => $name])->with(session()->flash('alert-danger', 'Something went wrong!!'));
        }
    }
    public function leftteam($name, $id, $username = null)
    {
        $contestname = str_replace("_", " ", $name);
        $contest = Contest::where('name', $contestname)->where('status', '=', 1)->first();
        if (!is_null($contest)) {
            if ($this->RegistrationIsOpen($contest->id)) {
                $team = Team::find($id);
                if (!is_null($team)) {

                    //if username exsit
                    if (!is_null($username)) {

                        //checck if user exsit
                        $user = User::where("username", $username)->first();
                        if (!is_null($user)) {
                            //check if admin
                            if ((Gate::allows('OrganizerOrAdmin', $contest->id)) ||  ($team->leader == Auth::user()->username)) {
                                if ($team->leader != $username) {
                                    //you are on team

                                    if ($this->ImOnThisTeam($team->id, $user->id)) {
                                        //all done
                                        $TeamUser = TeamUser::where("team_id", $team->id)->where("user_id", $user->id);
                                        $TeamUser->delete();

                                        return redirect()->route('UserTeams', ['name' => $name])->with(session()->flash('alert-success', 'The participant was cleared from team'));
                                    } else {

                                        return redirect()->route('UserTeams', ['name' => $name])->with(session()->flash('alert-danger', 'Something went wrong!!'));
                                    }
                                } else {
                                    return redirect()->route('UserTeams', ['name' => $name])->with(session()->flash('alert-danger', 'The leader cannot left team.'));
                                }
                            } else {

                                return redirect()->route('UserTeams', ['name' => $name])->with(session()->flash('alert-danger', 'You do not have permission.'));
                            }
                        } else {

                            return redirect()->route('UserTeams', ['name' => $name])->with(session()->flash('alert-danger', 'Something went wrong!!'));
                        }
                    } else {
                        //user requset
                        if ($team->leader != Auth::user()->username) {
                            //you are on team
                            if ($this->ImOnThisTeam($team->id, Auth::user()->id)) {
                                //all done
                                $TeamUser = TeamUser::where("team_id", $team->id)->where("user_id", Auth::user()->id);
                                $TeamUser->delete();
                                return redirect()->route('UserTeams', ['name' => $name])->with(session()->flash('alert-success', 'You have successfully left the team'));
                            } else {

                                return redirect()->route('UserTeams', ['name' => $name])->with(session()->flash('alert-danger', 'Something went wrong!!'));
                            }
                        } else {
                            return redirect()->route('UserTeams', ['name' => $name])->with(session()->flash('alert-danger', 'You do not have permission.'));
                        }
                    }
                } else {
                    return redirect()->route('UserTeams', ['name' => $name])->with(session()->flash('alert-danger', 'Something went wrong!!'));
                }
            } else {
                return redirect()->route('UserTeams', ['name' => $name])->with(session()->flash('alert-danger', 'Left team is closed, the competition has already started'));
            }
        } else {
            return redirect()->route('UserTeams', ['name' => $name])->with(session()->flash('alert-danger', 'Something went wrong!!'));
        }
    }

    public function RegistrationIsOpen($id)
    {
        $contest = Contest::find($id);
        if (!is_null($contest)) {
            if (($contest->starting_date > date('Y-m-d H:i:s')) && ($contest->status == 1) && ($contest->participation == 'team')) {

                return True;
            } else
                return FALSE;
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

    public function IsNameTaken($id, $name)
    {
        $taken = FALSE;
        $teams = Team::where('name', $name)->get();

        foreach ($teams as $team) {
            if (!is_null(ContestTeam::where("team_id", $team->id)->where("contest_id", $id)->first())) {
                $taken = TRUE;
            }
        }

        return $taken;
    }

    public function DoYouHaveTeam($id, $userid)
    {
        $have = FALSE;
        $TeamUser = TeamUser::where('user_id', $userid)->get();

        foreach ($TeamUser as $team) {
            if (!is_null(ContestTeam::where("team_id", $team->team_id)->where("contest_id", $id)->first())) {
                $have = TRUE;
            }
        }

        return $have;
    }

    public function TeamRemove($teamid)
    {
        $TeamUser = TeamUser::where("team_id", $teamid);
        $TeamUser->delete();

        $ContestTeam = ContestTeam::where("team_id", $teamid);
        $ContestTeam->delete();

        $Team = Team::find($teamid);
        $Team->delete();

        if (($TeamUser) && ($ContestTeam) && ($Team))
            return TRUE;
        else
            return FALSE;
    }

    public function ImOnThisTeam($teamid, $userid)
    {
        $TeamUser = TeamUser::where("team_id", $teamid)->where('user_id', $userid)->first();
        if (!is_null($TeamUser))
            return TRUE;
        else
            return FALSE;
    }
}
