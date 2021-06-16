<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Auth;
use App\Models\Contest;
use App\Models\Problem;
use App\Models\TestCase;
use App\Models\ProblemTestReference;
use Symfony\Component\Process\Exception\ProcessFailedException;
use Symfony\Component\Process\Process;
use Symfony\Component\Process\InputStream;

class ControlPanel extends Controller
{


    public function index()
    {

        //Auth::user()
        //Gate::allows('show')
        if(Gate::allows('AdminOrManager')){



            return view('admin.home');

        }
        else
        {abort(401);}
    }



    public function AuthenticationUsers()
    {
        if(Gate::allows('AdminOnly')){
            $users = User::all();
            return view('admin.authentication.users')->with('users', $users);
        }
        else
        {abort(401);}
    }


    public function contestsView()
    {

        if(Gate::allows('AdminOrManager')){
            $contests = Contest::all();






        //return view('admin.contests.view',['contests'=>$contests],['live'=>$live],['upcoming'=>$upcoming],['archived'=>$archived]);
        return view('admin.contests.view')
            ->with('contests', $contests);
        }
        else
        {abort(401);}
    }

    
  

    public function ProblemsView()
    {
        if(Gate::allows('AdminOrManager')){

        $problems = Problem::with('Testcases')->get();
        //dd(json_encode($problems));
        $last = Problem::latest()->first();
        //dd($last->name);
        $mostauthor = Problem::select('author_id')
    ->selectRaw('COUNT(*) AS count')
    ->groupBy('author_id')
    ->orderByDesc('count')
    ->limit(1)
    ->first();



        return view('admin.problems.view')
        ->with('problems', $problems)
            ->with('last', $last)
            ->with('mostauthor', $mostauthor);
        }
        else
        {abort(401);}
    }

    


    public function testcaseview($id)
    {

        if(Gate::allows('AdminOrManager')){

            $problems = Problem::with('Testcases')->where('id' , $id)->first();
            
            if($problems)
            {

                $executtime = 0;

                for ($i = 0 ; $i < $problems->Testcases->count() ; $i++)
                {
                    $executtime = $problems->Testcases[$i]->timelimit + $executtime;
                }
                $executtime = $executtime / 60;

    
                return view('admin.problems.testcase')
                ->with('problems', $problems)
                ->with('executtime' , $executtime);
            }
            else
            {abort(404);}

            }
            else
            {abort(401);}

    }



}
