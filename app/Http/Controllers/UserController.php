<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateUserRequest;
use App\Services\TwitchApiService;
use App\Repositories\UserRepository;

class UserController extends Controller
{

    public function index(){
        return view('create_user');
    }

    public function createUser(CreateUserRequest $request, TwitchApiService $twitchApiService, UserRepository $userRepository){
        if($userRepository->exists('username', $request->username)){
            $message = 'Our database already have this user.';
        }else{
            if($user = $twitchApiService->getUser($request->username)){
                $result = $userRepository->createFromTwitchApi($user);
                $message = $result ? 'Create success.' : 'Create error.';
            }else{
                $message = 'Getting user info error.';
            }
        }

        return redirect()->route('create_user_index')->with(['banner' => $message]);
    }
}