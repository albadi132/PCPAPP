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
    if(!is_null($user))
    {

        //check if competions exsite && open && team
        if($this->RegistrationIsOpen($request->contestid))
        {
            //check if user sup

            if($this->IsSubscribe($request->contestid , $user->id))
            {

    //check if there is no team with same name on same competion
    if(!$this->IsNameTaken($request->contestid , $request->name))
    {
        //check if you are in team
        if(!$this->DoYouHaveTeam($request->contestid ,$user->id))
        {

            //all Done

            //creat team
            $team = new Team;
            $team->name = $request->name;
            $team->leader = $user->id;
            $save =  $team->save();

            if( $save )
            {
                
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
            

            }
            else
            {
                return [
                    'status' => 404,
                    'description' => "Something went wrong!!",
                ];
    

            }
            


            
            
    
        }
        else
        {
            return [
                'status' => 404,
                'description' => "You are already registered in a team.",
            ];
    
        }
    


    }
    else
    {
        return [
            'status' => 404,
            'description' => "This name is already taken.",
        ];

    }



            }
            else
            {
                return [
                    'status' => 404,
                    'description' => "Subscribe in the competition first.",
                ];
    
            }


         }
        else
        {
            return [
                'status' => 404,
                'description' => "Something went wrong!!",
            ];

        }
    

    }
    else{

        return [
            'status' => 402,
            'description' => "Sorry, There is an error!!",
        ];

    }

    

    }

    public function RegistrationIsOpen($id)
    {
        $contest = Contest::find($id);
        if(!is_null($contest))
        {
            if(($contest->starting_date > date('Y-m-d H:i:s')) && ($contest->status == 1) && ($contest->participation == 'team')){
               
                return True;
            }
            else
            return FALSE;

        }
        else
        {
        return FALSE;}

    }

    public function IsSubscribe($id,$userid)
    {
        $contestuser = ContestUser::where('user_id' , $userid)->where('contest_id' , $id )->first();

        if(!is_null($contestuser))
        return TRUE;
        else
        return FALSE;


    }

    public function IsNameTaken($id,$name)
    {
        $taken = FALSE;
        $teams = Team::where('name' , $name)->get();

        foreach ($teams as $team) {
            if(!is_null(ContestTeam::where("team_id" , $team->id )->where("contest_id" , $id)->first()))
            {
                $taken = TRUE;
            }

            }

        return $taken ;


    }

    public function DoYouHaveTeam($id,$userid)
    {
        $have = FALSE;
        $TeamUser = TeamUser::where('user_id' , $userid)->get();
        
        foreach ($TeamUser as $team) {
            if(!is_null(ContestTeam::where("team_id" , $team->team_id )->where("contest_id" , $id)->first()))
            {
                $have = TRUE;
                
            }

            }
            
        return $have ;


    }
    
}
