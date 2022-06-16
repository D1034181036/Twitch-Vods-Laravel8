<?php

namespace App\Repositories;

use App\Models\Users;

class UserRepository
{
    private $model;

    public function __construct(Users $model){
        $this->model = $model;
    }

    public function exists($column, $value){
        return $this->model
            ->where($column, $value)
            ->exists();
    }

    public function createFromTwitchApi($user){
        return $this->model
            ->create([
                'user_id' => $user->id,
                'username' => $user->login,
                'display_name' => $user->display_name,
                'profile_image_url' => $user->profile_image_url,
            ]);
    }
}