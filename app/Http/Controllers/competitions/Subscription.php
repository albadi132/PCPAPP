<?php

namespace App\Http\Controllers\competitions;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use App\Models\Contest;
use App\Models\ContestUser;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Auth;


class Subscription extends Controller
{
    public function registration(Request $request)
    {
        
        $this->validate($request, [
            'participant.*.email' => ['required', 'string', 'email', 'max:255'],
            'contestid' => ['required'],
        ],
        [   
            'participant.*.email.required'    => 'Please Provide Email Address',
            'participant.*.email.string'      => 'Please Provide Email Address',
            'participant.*.email.email' => 'Please Provide Email Address',
            'participant.*.email.max:255'      => 'Email Address cant be more than 255 charcater',
        ]);
        

       
//Check the permissions
        if(Gate::allows('OrganizerOrAdmin', $request->contestid))
        {
            
//Make sure of the competition

            if($this->RegistrationIsOpen($request->contestid))
            { 
                //Check emails
                $dataSet = [];
                foreach ($request->participant as $sup) {

                    $user = User::where('email' , $sup['email'])->first();
                    
                    if(!is_null($user))
                    {
                       
                        $dataSet[] = [
                            'user_id'  => $user->id,
                            'contest_id'    => $request->contestid,
                            'role'       => 'competitor',
                            'created_at' =>  \Carbon\Carbon::now(), # new \Datetime()
                            'updated_at' => \Carbon\Carbon::now(),  # new \Datetime()
                        ];
                        
                    }
                    else{
                        return [
                            'status' => 402,
                            'description' => "There is an error, make sure that this email ".$sup['email']." is linked to an account",
                        ];

                    }
                    
                   
                }

                //All Done
                $saved = DB::table('contest_user')->insert($dataSet);
                if($saved)
                {
                return [
                    'status' => 200,
                    'description' => "Competitors have been successfully registered",
                ];}
                else
                {return [
                    'status' => 404,
                    'description' => "Something went wrong!!",
                ];}



            }
            else{ 
                return [
                    'status' => 404,
                    'description' => "Something went wrong!!",
                ];
            }
        
        }
        else
        {
            return [

                'status' => 401,
                'description' => "You do not have permission to add participants",
            ];

        }

    }


    public function subscribe($name , $id)
    {
        //dd($name,$userid);

        //check if user exist auth
        if(!is_null(Auth::user()))
{
        //check if sup is open
        if($this->RegistrationIsOpen($id))
            {

                //check if sup is not privet
                if($this->ContestStatus($id))
                {
    
                    //all Done
                    $competitor = new ContestUser;

                    $competitor->user_id = Auth::user()->id;
                    $competitor->contest_id = $id;
                    $competitor->role = 'competitor';
                    $competitor->save();
                    return redirect()->route('competition', ['name' => $name ])->with(session()->flash('alert-success', 'Successful subscription, good luck.'));
    
    
    
                 }
            else
            {
                return redirect()->route('competition', ['name' => $name])->with(session()->flash('alert-danger', 'This contest is private, ask the organizers to register.'));
            }



             }
        else
        {
            return redirect()->route('competition', ['name' => $name])->with(session()->flash('alert-danger', 'Something went wrong!!'));
        }
    


        //check if sup is not privet

}
else
{
    return redirect()->route('competition', ['name' => $name])->with(session()->flash('alert-danger', 'You need to log in first to subscribe in the contest.'));
}
        


    }
    public function Unsubscribed($name,$userid)
    {

    }


    public function RegistrationIsOpen($id)
    {
        $contest = Contest::find($id);
        if(!is_null($contest))
        {
            if(($contest->starting_date > date('Y-m-d H:i:s')) && ($contest->status == 1)){
               
                return True;
            }
            else
            return FALSE;

        }
        else
        {
        return FALSE;}

    }
    public function ContestStatus($id)
    {
        $contest = Contest::find($id);

        if($contest->type == 'private')
        {
            return FALSE;
        }
        else
        return TRUE;
       

    }


    
}
