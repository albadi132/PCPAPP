<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Gate;

class Users extends Controller
{
    public function editRole(Request $request)
    {
        if (Gate::allows('AdminOnly')) {

            $this->validate($request, [
                'userRole' => ['required', 'in:user,manager,admin'],
            ]);

            $change = FALSE;

            $user = User::where('id', $request->targetUser)->first();

            if ($user) {
                if ($user->role != $request->userRole) {
                    $user->role = $request->userRole;
                    $change = TRUE;
                }

                if ($change) {
                    $user->save();
                    return [
                        'status' => 200,
                        'description' => 'User role changed successfully',
                    ];
                } else {
                    return [
                        'status' => 422,
                        'description' => 'You have not made any change',
                    ];
                }
            } else {
                return [
                    'status' => 422,
                    'description' => 'Something went wrong!!',
                ];
            }
        } else {
            return [
                'status' => 403,
                'description' => 'You do not have permission to change user role',
            ];
        }
    }
}
