<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Gate;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Validator;
use App\Models\Contest;
use Intervention\Image\ImageManagerStatic as Image;



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
            'endingtime' => ['required', 'date', 'after_or_equal:startingtime'],
            'logo' => ['required', 'base64image'],
            'private' => ['required', 'boolean'],
            'team' => ['required', 'boolean'],
            'conditions' => [ 'max:1500'],
            'prize' => [ 'max:1500'],
            'profile' => [ 'required','base64image']
        ]);
   

       // $logo = $request->file('logo')->getClientOriginalName();
        //dd($logo);
        
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
        $contest->ending_date = $request->endingtime;
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
                'status' => 200,
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



    public function edit(Request $request , $id)
    {
        
        
       //dd(Gate::allows('creat'));

       if(Gate::allows('creat'))
       {

        if(Contest::findOrFail($id))
           {
        $contest = Contest::find($id);



        //name check
        

        if(strcmp($contest->name, $request->name) !== 0)
        {
            
            $temp = Contest::where('name', $request->name)->get();

            if(!isset($temp[0]->id))
            {
                $this->validate($request, [
                    'name' => ['required', 'string', 'max:255'] 
                ]);
                $contest->name = $request->name;
               
            }
            else{
                return back()->with('error','The contest name is already used');
                
            }

        }

        //des

        if(strcmp($contest->description, $request->description)!==0 )
        {
            $this->validate($request, [
                'description' => ['required', 'string', 'max:1500']
                ]);
        
                $contest->description = $request->description;
               

        }


        //logo

        if(!is_null($request->logo))
        {
            $this->validate($request, [
                'logo' => ['required', 'image', 'mimes:jpeg,png,jpg', 'max:2048'],
                
            ]);

        $newImageName = time() . '.png';
        $newPath = 'contests/images/';
        $request->logo->move(public_path($newPath), $newImageName);
        $contest->logo = $newImageName;
       

        }




        //times

        if(($contest->starting_date != $request->startingtime)|($contest->ending_date != $request->endingtime))
        {
            if( ($contest->starting_date <= date('Y-m-d H:i:s')) | ($contest->ending_date <= date('Y-m-d H:i:s')) )
            {
                return back()->with('error','You cannot change the time or date because the competition has already started');
            }
            else
            {
                $this->validate($request, [
                    'startingtime' =>[ 'required','date','after_or_equal:now'],
                    'endingtime' => ['required', 'date', 'after_or_equal:startingtime'],
                ]);

                $contest->starting_date = $request->startingtime;
                $contest->ending_date = $request->endingtime;
                

            }


        }

        //type

        if(is_null($request->private)){
            if(strcmp($contest->type, 'public') !== 0)
            {
                
                $contest->type = 'public';
                
               
            }
            
        }else
        {
            if(strcmp($contest->type, 'private') !== 0)
            {
                $contest->type = 'private';
               
            }

        }



        //part

        if(is_null($request->team)){
            if(strcmp($contest->participation, 'solo') !== 0)
            {
                $contest->participation = 'solo';
                
            }
            
        }else
        {
            if(strcmp($contest->participation, 'team') !== 0)
            {
                $contest->participation = 'team';
               
            }

        }


        
        $contest->save();
        return redirect()->route('contests-view')->with('success','Successfully modified');
    }
    else{abort(404);

    }
       }
       else
        {abort(401);}


    }



}
