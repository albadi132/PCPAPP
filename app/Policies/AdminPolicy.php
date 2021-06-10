<?php

namespace App\Policies;

use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;
use Illuminate\Support\Facades\Auth;

class AdminPolicy
{
    use HandlesAuthorization;

    /**
     * Create a new policy instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    public function AdminOnly()
    {

        return Auth::user()->role === 'admin';
    }

    public function show()
    {

        return Auth::user()->role === 'admin';
    }

    public function AdminOrManager()
    {
        return (Auth::user()->role === 'admin') || (Auth::user()->role === 'manager');

    }
}
