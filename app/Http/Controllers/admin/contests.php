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
            'private' => ['max:2'],
            'team' => ['max:2'],
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
                $contest->save();
            }
            else{
                return back()->with('error','Name of commpation takin');
                
            }

        }

        //des

        if(strcmp($contest->description, $request->description)!==0 )
        {
            $this->validate($request, [
                'description' => ['required', 'string', 'max:1500']
                ]);
        
                $contest->description = $request->description;
                $contest->save();

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
        $contest->save();

        }




        //times


        //type

        //part





       }
       else
        {abort(401);}


    }



}
