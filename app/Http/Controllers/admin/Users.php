<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Hash;

class Users extends Controller
{
    public function changeRole(Request $request)
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

    public function changeStatus(Request $request)
    {
        if (Gate::allows('AdminOnly')) {

            $this->validate($request, [
                'userStatus' => ['required', 'integer', 'min:0', 'max:1'],
            ]);

            $change = FALSE;

            $user = User::where('id', $request->targetUser)->first();

            if ($user) {
                if ($user->status != $request->userStatus) {
                    $user->status = $request->userStatus;
                    $change = TRUE;
                }

                if ($change) {
                    $user->save();
                    return [
                        'status' => 200,
                        'description' => 'User status changed successfully',
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
                'description' => 'You do not have permission to change user status',
            ];
        }
    }

    public function restPass(Request $request)
    {
        if (Gate::allows('AdminOnly')) {

            $this->validate($request, [
                'userPassword' => ['required', 'string', 'min:8', 'confirmed'],
            ]);

            $change = FALSE;

            $user = User::where('id', $request->targetUser)->first();

            if ($user) {
                if (!Hash::check($request->userPassword, $user->password)) {
                    $user->password = Hash::make($request->userPassword);
                    $change = TRUE;
                }

                if ($change) {
                    $user->save();
                    return [
                        'status' => 200,
                        'description' => 'User password reset successfully',
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
                'description' => 'You do not have permission to reset user password',
            ];
        }
    }
}
