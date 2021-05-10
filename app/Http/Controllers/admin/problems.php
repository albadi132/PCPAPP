<?php

namespace App\Http\Controllers\admin;

use Illuminate\Support\Facades\Gate;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Problem;

class problems extends Controller
{
    public function creat(Request $request)
    {
        
       //dd(Gate::allows('creat'));

       if(Gate::allows('creat'))
       {
        
        $this->validate($request, [
            'name' => ['required','unique:problems_library','regex:/^[a-zA-Z0-9 ]+$/', 'string', 'max:255'],
            'description' => ['required', 'string', 'max:1500'],
            'question' => ['required', 'mimes:pdf', 'max:10000'],
            'score' => ['required', 'integer', 'max:1000'],
            
        ]);

        $newPdfName = time() . '.pdf';
        $newPath = 'contests/library/';
        $request->question->move(public_path($newPath), $newPdfName);

        $problem = new Problem();
        $problem->name = $request->name;
        $problem->description = $request->description;
        $problem->file = $newPdfName;
        $problem->points = $request->score;
        $problem->author_id = auth()->user()->id;

        $problem->save();
        
        if( $problem != null){ return redirect()->route('problems-view')->with('success','The problem has been successfully added to the library');}
        else{return redirect()->route('problems-creat')->with('error','There is an error!');}

       }
       else
        {abort(401);}


    }

    public function edit(Request $request , $id)
    {
        
        
       //dd(Gate::allows('creat'));

       if(Gate::allows('creat'))
       {

        if(Problem::findOrFail($id))
           {
        $problem = Problem::find($id);



        //name check
        

        if(strcmp($problem->name, $request->name) !== 0)
        {
            
            $temp = Problem::where('name', $request->name)->get();

            if(!isset($temp[0]->id))
            {
                $this->validate($request, [
                    'name' => ['required', 'string', 'max:255'] 
                ]);
                $problem->name = $request->name;
               
            }
            else{
                return back()->with('error','The problem name is already used');
                
            }

        }

        //des

        if(strcmp($problem->description, $request->description)!==0 )
        {
            $this->validate($request, [
                'description' => ['required', 'string', 'max:1500']
                ]);
        
                $problem->description = $request->description;
               

        }


        //file

        if(!is_null($request->question))
        {
            $this->validate($request, [
                'question' => ['required', 'mimes:pdf', 'max:10000'],
                
            ]);

            $newPdfName = time() . '.pdf';
            $newPath = 'contests/library/';
            $request->question->move(public_path($newPath), $newPdfName);
            $problem->file =  $newPdfName;

        }

        if($problem->points != $request->score)
        {
            $this->validate($request, [
                'score' => ['required', 'integer', 'max:1000'],
                
            ]);
            $problem->points = $request->score;


        }



        $problem->save();
        return redirect()->route('problems-view')->with('success','Successfully modified');
    }
    else{abort(404);

    }
       }
       else
        {abort(401);}


    }


}
