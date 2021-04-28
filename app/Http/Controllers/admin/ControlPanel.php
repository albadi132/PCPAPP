<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Auth;
use App\Models\Contest;
use App\Models\Problem;
class ControlPanel extends Controller
{


    public function index()
    {
        
        //Auth::user()
        //Gate::allows('show')
        if(Gate::allows('show')){
        return view('admin.home');
        }
        else
        {abort(401);}
    }

   

    public function AuthenticationUsers()
    {
        
        if(Gate::allows('show')){
        return view('admin.authentication.users');
        }
        else
        {abort(401);}
    }

    public function AuthenticationRole()
    {
        
        if(Gate::allows('show')){
        return view('admin.authentication.role');
        }
        else
        {abort(401);}
    }


    public function contestsView()
    {
        
        if(Gate::allows('show')){
            $contests = Contest::all();

            $live = Contest::where('starting_date', '<=', date('Y-m-d H:i:s'))
            ->where('ending_date', '>=', date('Y-m-d H:i:s'))->count();
            $upcoming= Contest::where('starting_date', '>', date('Y-m-d H:i:s'))->count();
            $archived= Contest::where('ending_date', '<', date('Y-m-d H:i:s'))->count();

            
            
            

        //return view('admin.contests.view',['contests'=>$contests],['live'=>$live],['upcoming'=>$upcoming],['archived'=>$archived]);
        return view('admin.contests.view')
            ->with('contests', $contests)
            ->with('live', $live)
            ->with('upcoming', $upcoming)
            ->with('archived', $archived);
        }
        else
        {abort(401);}
    }

    public function contestsCreat()
    {
        
        if(Gate::allows('show')){
        return view('admin.contests.creat');
        }
        else
        {abort(401);}
    }

    public function contestsEdit($id)
    {
        
        if(Gate::allows('show')){

           if(Contest::findOrFail($id))
           {
            $contest= Contest::where('id', $id)->get();
            
            return view('admin.contests.edit',['contest'=>$contest]);

           }
           else{
abort(404);
           }
           

        
        }
        else
        {abort(401);}
    }

    public function contestsActive($id)
    {
        if(Gate::allows('show')){

            if(Contest::findOrFail($id))
            {
             $contest= Contest::find($id);
             if($contest->status === 1){
                $contest->status = 0;
                $contest->save();
             return redirect()->route('contests-view')->with('success','Successfully deactivate');
             }
             else{
                $contest->status = 1;
                $contest->save();
                return redirect()->route('contests-view')->with('success','Successfully activate');
             }
             
 
            }
            else{
 abort(404);
            }
            
 
         
         }
         else
         {abort(401);}
    }
    public function contestsDelate($id)
    {
        if(Gate::allows('show')){

            if(Contest::findOrFail($id))
            {
                $contest= Contest::find($id);
                $contest->delete();
                return redirect()->route('contests-view')->with('success','The contest has been deleted');

 
            }
            else{
 abort(404);
            }
            
 
         
         }
         else
         {abort(401);}
    }


    public function ProblemsView()
    {
        if(Gate::allows('show')){

        $problems = Problem::all();
        $count = $problems->count();
        $last = Problem::latest()->first();
        //dd($last->name);
        $mostauthor = Problem::select('author_id')
    ->selectRaw('COUNT(*) AS count')
    ->groupBy('author_id')
    ->orderByDesc('count')
    ->limit(1)
    ->get();
  
        return view('admin.problems.view')
        ->with('problems', $problems)
            ->with('count', $count)
            ->with('last', $last)
            ->with('mostauthor', $mostauthor);
        }
        else
        {abort(401);}
    }

    public function ProblemsCreat()
    {
        
        if(Gate::allows('show')){
        return view('admin.problems.creat');
        }
        else
        {abort(401);}
    }
    
    

    public function problemsEdit($id)
    {
        
        if(Gate::allows('show')){

           if(Problem::findOrFail($id))
           {
            $Problem= Problem::where('id', $id)->get();
            
            return view('admin.problems.edit',['problem'=>$Problem]);

           }
           else{
abort(404);
           }
           

        
        }
        else
        {abort(401);}
    }


    public function problemsDelate($id)
    {
        if(Gate::allows('show')){

            if(Problem::findOrFail($id))
            {
                $Problem= Problem::find($id);
                $Problem->delete();
                return redirect()->route('problems-view')->with('success','The problem has been deleted');

 
            }
            else{
 abort(404);
            }
            
 
         
         }
         else
         {abort(401);}
    }


    
}
