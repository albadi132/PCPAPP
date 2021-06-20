<?php

namespace App\Http\Controllers\users;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Intervention\Image\ImageManagerStatic as Image;

class ProfileController extends Controller
{
    public function profile($username)
    {
        $user = User::with('Contests')->select('id', 'username', 'first_name', 'last_name', 'email', 'about', 'gender', 'role', 'avatar', 'is_verified', 'created_at', 'workplace', 'job')
            ->where('username', $username)->first();
        if (!is_null($user)) {

            return view('users.profile')->with('user', $user);
        } else {
            abort(404);
        }
    }

    public function editprofile(Request $request, $username)
    {




        if (Gate::allows('Myprofile', $username)) {

            $this->validate($request, [
                'about' => ['max:2550'],
                'workplace' => ['max:255'],
                'job' => ['max:255'],
                'gender' => ['required', 'in:Male,Female'],
                'avatar' => ['base64image'],
            ]);


            $change = FALSE;

            $user = User::where('username', $username)->first();

            if (!empty($request->about)) {
                $user->about = $request->about;
                $change = TRUE;
            }

            if (!empty($request->job)) {
                $user->workplace = $request->workplace;
                $change = TRUE;
            }

            if (!empty($request->job)) {
                $user->job = $request->job;
                $change = TRUE;
            }

            if ($user->gender != $request->gender) {
                $user->gender = $request->gender;
                $change = TRUE;
            }

            if (!empty($request->avatar)) {
                try {
                    $img = Image::make($request->avatar);
                    $name = $username . "_" . time() . '.jpg';
                    $img->save(public_path('images/avatar/' . $name));
                    $user->avatar = $name;
                    $change = TRUE;
                } catch (\Exception $e) {

                    return [
                        'status' => 422,
                        'description' => "There was an error uploading your avatar",
                    ];
                }
            }


            if ($change) {
                $user->save();
                return [
                    'status' => 200,
                    'description' => "Profile updated successfully",
                ];
            } else {
                return [
                    'status' => 422,
                    'description' => "You have not made any changes",
                ];
            }
        } else {
            return [
                'status' => 403,
                'description' => "You do not have permission to change profile",
            ];
        }
    }

    public function resetpassword(Request $request, $username)
    {

        
        if (Gate::allows('Myprofile', $username)) {


            $this->validate($request, [
                'newPassword' => ['required', 'string' , 'min:8' ],
                'oldPassword' => ['required', 'string' , 'min:8' ],
            ]);

            $user = User::where('username' , $username)->first();

            if($user)
            {
                if( Hash::check($request->oldPassword, $user->password))
                {

                    $newhash =  Hash::make($request->newPassword);
                    $user->password = $newhash;
                    $user->save();
                    return [
                    'status' => 200,
                    'description' => "Password has been updated",
                ];
                }
                else
                {
                    return [
                        'status' => 403,
                        'description' => "The previous password is incorrect",
                    ];

                }



            }
            else
            {
                return [
                'status' => 404,
                'description' => "Something went wrong",
            ];
            }


        



        }
        else
        {
            return [
                'status' => 403,
                'description' => "You do not have permission to change profile",
            ];

        }


    }
}
