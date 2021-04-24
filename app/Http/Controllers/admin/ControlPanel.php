<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Auth;
use App\Models\Contest;
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
            

        return view('admin.contests.view',['contests'=>$contests]);
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


    public function ProblemsView()
    {
        
        if(Gate::allows('show')){
        return view('admin.problems.view');
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


    
}
