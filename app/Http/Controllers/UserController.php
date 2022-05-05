<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Users;
use App\Http\Controllers\TwitchController;
use Illuminate\Validation\Rule;
use Illuminate\Validation\ValidationException;

class UserController extends Controller
{
    public function __construct(TwitchController $twitchController){
        $this->twitchController = $twitchController;
    }

    public function index(){
        return view('create_user');
    }

    public function createUserAction(Request $request){
        $validatedData = $request->validate([
            'username' => ['required'],
            'code' => ['required', Rule::in([config('common.secret_code')])],
        ]);

        $banner = $this->createUser($validatedData['username']);
        
        return redirect()->route('create_user_index')->with(['banner' => $banner]);
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
