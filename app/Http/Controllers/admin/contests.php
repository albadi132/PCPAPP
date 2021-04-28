<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Gate;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Validator;
use App\Models\Contest;




class contests extends Controller
{


    public function creat(Request $request)
    {
        
       //dd(Gate::allows('creat'));

       if(Gate::allows('creat'))
       {
        
        $this->validate($request, [
            'name' => ['required','unique:contests', 'string', 'max:255'],
            'description' => ['required', 'string', 'max:1500'],
            'startingtime' =>[ 'required','date','after_or_equal:now'],
            'endingtime' => ['required', 'date', 'after_or_equal:startingtime'],
            'logo' => ['required', 'image', 'mimes:jpeg,png,jpg', 'max:2048'],
            
        ]);
       // $logo = $request->file('logo')->getClientOriginalName();
        //dd($logo);

        $newImageName = time() . '.png';
        $newPath = 'contests/images/';
        $request->logo->move(public_path($newPath), $newImageName);

        $contest = new Contest();
        $contest->name = $request->name;
        $contest->description = $request->description;
        $contest->starting_date = $request->startingtime;
        $contest->ending_date = $request->endingtime;
        if(is_null($request->private)){$contest->type= 'public';}else{$contest->type= 'private';}
        if(is_null($request->team)){$contest->participation= 'solo';}else{$contest->participation= 'team';}
        $contest->logo = $newImageName;
        $contest->save();
        
        if( $contest != null){ return redirect()->route('contests-view')->with('success','Contest created successfully!');}
        else{return redirect()->route('contests-creat')->with('error','There is an error!');}

       }
       else
        {abort(401);}


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
