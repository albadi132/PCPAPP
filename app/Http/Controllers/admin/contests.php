<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Gate;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Validator;
use App\Models\Contest;
use App\Models\Problem;
use Carbon\Carbon;
use Intervention\Image\ImageManagerStatic as Image;
use PhpParser\Node\Expr\AssignOp\Concat;

class contests extends Controller
{


    public function creat(Request $request)
    {
        
       //dd(Gate::allows('creat'));
       if(Gate::allows('AdminOrManager'))
       {
       
        
        $this->validate($request, [
            'name' => ['required','unique:contests', 'string','regex:/^[a-zA-Z0-9 ]+$/', 'max:255'],
            'description' => ['required',  'max:1500'],
            'startingtime' =>[ 'required','date','after_or_equal:now'],
            'logo' => ['required', 'base64image'],
            'private' => ['required', 'boolean'],
            'team' => ['required', 'boolean'],
            'time' => ['required', 'boolean'],
            'conditions' => [ 'max:1500'],
            'prize' => [ 'max:1500'],
            'profile' => [ 'required','base64image']
        ]);
   

       // $logo = $request->file('logo')->getClientOriginalName();
        //dd($logo);
        
        if($request->time == 0 )
        {
            $this->validate($request, [
                'startingtime' =>[ 'required','date','after_or_equal:now'],
                'endingtime' => ['required', 'date', 'after_or_equal:startingtime'],
            ]);
        }


        $contest = new Contest();
       
            try {
                $imglogo = Image::make($request->logo);
                $logoname =  time() . '.png';
                $imglogo->save(public_path('contests/images/' . $logoname));
                $contest->logo = $logoname;

            } catch (\Exception $e) {

                return [
                    'status' => 422,
                    'description' => "There was an error uploading contest logo",
                ];
            }

            try {
                $imgprofile = Image::make($request->profile);
                $profilename =  time() . '.png';
                $imgprofile->save(public_path('contests/profile/' . $profilename));
                $contest->profile = $profilename;

            } catch (\Exception $e) {

                return [
                    'status' => 422,
                    'description' => "There was an error uploading contest profile",
                ];
            }
        
        $contest->name = $request->name;
        $contest->description = $request->description;
        $contest->starting_date = $request->startingtime;

        if($request->time == 0 )
        {
            $contest->ending_date = $request->endingtime;
        }
        else
        {
            $contest->opentime =  $request->time;
        }

        if($request->private == 1)
        $contest->type = 'private';
        else
        $contest->type = 'public';
        if($request->team == 1)
        $contest->participation = 'team';
        else
        $contest->participation = 'solo';

        if(!is_null($request->conditions))
        $contest->conditions = $request->conditions;
       
        if(!is_null($request->prize))
        $contest->prizes = $request->prize;
       
        $contest->save();
       
        if( $contest != null){ 
            return [
                'status' => 200,
                'description' => "Contest created successfully",
            ];
        }
        else{
            return [
                'status' => 404,
                'description' => "There is an error",
            ];
        }

       }
       else
        {
            return [
            'status' => 403,
            'description' => "You do not have permission to creat a contest",
        ];
    }


    }



    public function edit(Request $request)
    {
        
        

       if(Gate::allows('AdminOrManager'))
       {


           
        $this->validate($request, [
            'contest' => ['required'],
            'name' => ['required', 'string','regex:/^[a-zA-Z0-9 ]+$/', 'max:255'],
            'description' => ['required',  'max:1500'],
            'startingtime' =>[ 'required','date'],
            'logo' => ['required'],
            'private' => ['required', 'boolean'],
            'team' => ['required', 'boolean'],
            'time' => ['required', 'boolean'],
            'conditions' => [ 'max:1500'],
            'prize' => [ 'max:1500'],
            'profile' => [ 'required']
        ]);

        if($request->time == 0 )
        {
            $this->validate($request, [
                'startingtime' =>[ 'required','date'],
                'endingtime' => ['required', 'date', 'after_or_equal:startingtime'],
            ]);
        }
       
       
$contest = Contest::where('id'  , $request->contest)->first();
        if($contest)
           {
        
$change = false;
        //name check
        

        if(strcmp($contest->name, $request->name) !== 0)
        {
            
            $temp = Contest::where('name', $request->name)->first();

            if(!isset($temp->id))
            {
                
                $contest->name = $request->name;
                $change = true;
               
            }
            else{
                return [
                    'status' => 403,
                    'description' => "The contest name is already used",
                ];
                
            }

        }

        //des

        if(strcmp($contest->description, $request->description)!==0 )
        {
                $contest->description = $request->description;
                $change = true;
        }


        //logo /contests/images/ '/contests/profile/'

         $checklogo = substr($request->logo, 17);
        if(strcmp($contest->logo,$checklogo) !== 0)
        {
            $this->validate($request, [
                'logo' => ['required' , 'base64image'],
                
            ]);

            try {
                $imglogo = Image::make($request->logo);
                $logoname =  time() . '.png';
                $imglogo->save(public_path('contests/images/' . $logoname));
                $contest->logo = $logoname;
                $change = true;

            } catch (\Exception $e) {

                return [
                    'status' => 422,
                    'description' => "There was an error uploading contest logo",
                ];
            }

        }


        $checkprofile = substr($request->profile, 18);
        if(strcmp($contest->profile,$checkprofile) !== 0)
        {
            $this->validate($request, [
                'profile' => ['required' , 'base64image'],
                
            ]);
            
           
            try {
                $imgprofile = Image::make($request->profile);
                $profilename =  time() . '.png';
                $imgprofile->save(public_path('contests/profile/' . $profilename));
                $contest->profile = $profilename;
                $change = true;

            } catch (\Exception $e) {

                return [
                    'status' => 422,
                    'description' => "There was an error uploading contest profile",
                ];
            }

        }




        //times

        if(($contest->starting_date != $request->startingtime)|($contest->ending_date != $request->endingtime)|($contest->opentime != $request->time))
        {
            

                $contest->starting_date = $request->startingtime;

                if($request->time == 0 )
                {
                    $contest->ending_date = $request->endingtime;
                }
                else
                {
                    $contest->opentime =  $request->time;
                }
                $change = true;


        }

        //type

        if(($request->private == 1) & ($contest->type == 'public'))
        {
            $contest->type = 'private';
            $change = true;
        }


        if(($request->private == 0 ) & ($contest->type == 'private'))
        {
            $contest->type = 'public';
            $change = true;
        }


        //part
        if(($request->team == 1) & ($contest->participation == 'solo'))
        {
            $contest->participation = 'team';
            $change = true;
        }

        if(($request->team == 0) & ($contest->participation == 'team'))
        {
            $contest->participation = 'solo';
            $change = true;
        }
     
        //

        if(strcmp($contest->conditions, $request->conditions)!==0 )
        {
                $contest->conditions = $request->conditions;
                $change = true;
        }

        if(strcmp($contest->prizes, $request->prize)!==0 )
        {
                $contest->prizes = $request->prize;
                $change = true;
        }


        if($change)
        {
        $contest->save();
        return [
            'status' => 200,
            'description' => "Contest successfully modified",
        ];
        }
        else
        {
            return [
                'status' => 404,
                'description' => "Error, you haven't changed anything",
            ];
        }
        


    }
    else{
        return [
            'status' => 404,
            'description' => "There is an error",
        ];
    }
       }
       else
        {  return [
            'status' => 403,
            'description' => "You do not have permission for this action",
        ];}


    }

    public function contestsActive(Request $request)
    {
        if(Gate::allows('AdminOrManager')){

            $this->validate($request, [
                'status' => ['required', 'boolean'],
                'id' => ['required'],
            ]);

            $contest = Contest::where('id', $request->id)->first();

            if($contest)
            {
              $contest->status =  $request->status;

                $contest->save();
                return [
                    'status' => 200,
                    'description' => "Contest status changed successfully",
                ];
            }
            else
            {
                return [
                    'status' => 404,
                    'description' => "There is an error",
                ];
            }

            
         }
         else
         {
             return [
             'status' => 403,
             'description' => "You do not have permission for this action",
         ];
        }
    }




}
