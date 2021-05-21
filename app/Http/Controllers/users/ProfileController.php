<?php

namespace App\Http\Controllers\users;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;

class ProfileController extends Controller
{
    public function profile($username)
    {
        $user = User::with('Contests')->select('id','username','first_name','last_name','email','about','gender','role','avatar','is_verified','created_at' , 'workplace' ,'job')
            ->where('username' , $username)->first();
        if(!is_null($user))
        {
            
            return view('users.profile')->with('user',$user);

        }

        else{
            abort(404);
        }

        
    }
}
