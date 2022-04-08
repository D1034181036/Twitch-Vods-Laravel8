<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Users;
use App\Http\Controllers\TwitchController;

class UserController extends Controller
{
    public function __construct(TwitchController $twitchController){
        $this->twitchController = $twitchController;
    }

    public function getAllUsers(){
        return Users::get();
    }

    public function createUserAction(Request $request){
        if($request->input('username') && $request->input('code')){
            if($request->input('code') === config('common.secret_code')){
                $banner = $this->createUser($request->input('username'));
                return view('create_user', ['banner' => $banner]);
            }else{
                return view('create_user', ['banner' => 'Code Error!']);
            }
        }

        return view('create_user', ['banner' => '']);
    }

    private function createUser($username){
        // (1) Already have this user           => false
        // (2) Twitch API don't have this user  => false
        // (3) Twitch API have this user        => insert

        if(Users::where('username', $username)->first()){
            return 'Our database already have this user.';
        }

        $user = $this->twitchController->getUser($username);
        if(!$user){
            return 'Getting user info error.';
        }
        
        $result = Users::create([
            'user_id' => $user->id,
            'username' => $user->login,
            'display_name' => $user->display_name,
            'profile_image_url' => $user->profile_image_url,
        ]);

        return $result ? 'Insert success!' : 'Insert error!';
    }
}
