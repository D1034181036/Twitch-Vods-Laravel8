<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateUserRequest;
use App\Services\TwitchApiService;
use App\Models\Users;

class UserController extends Controller
{
    public function index(){
        return view('create_user');
    }

    public function createUser(CreateUserRequest $request, TwitchApiService $twitchApiService){
        
        // Case 1: User already exist.
        // Case 2: Getting user info error.
        // Case 3: Success Create.

        $userExists = Users::where('username', $request->username)->exists();

        if($userExists){
            $message = 'Our database already have this user.';
        }else{
            $user = $twitchApiService->getUser($request->username);

            if(!$user){
                $message = 'Getting user info error.';
            }else{
                $result = Users::create([
                    'user_id' => $user->id,
                    'username' => $user->login,
                    'display_name' => $user->display_name,
                    'profile_image_url' => $user->profile_image_url,
                ]);

                $message = $result ? 'Created successfully.' : 'Created error.';
            }
        }

        return redirect()->route('create_user_index')->with(['banner' => $message]);
    }
}