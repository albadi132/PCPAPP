<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function __construct()
    {
        $this->middleware(['guest']);
    }

    public function index()
    {
        return view('auth.login');
    }

    public function credentials(Request $request)
    {
        $this->validate($request, [
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if (!auth()->attempt(array_merge($request->only('email', 'password'), ['is_verified' => 1, 'status' => 1]) ,$request->remember)) {
            return back()->with(session()->flash('alert-danger', 'Invalid login details'));


        }

        return redirect()->route('home');
    }


}
