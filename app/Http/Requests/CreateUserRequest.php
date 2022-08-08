<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateUserRequest extends FormRequest
{
    public function authorize()
    {
        return true; // True => No need to verify authentication.
    }

    public function rules()
    {
        return [
            'username' => 'bail|required|string',
            'code' => 'bail|required|string|in:' . config('common.secret_code'),
        ];
    }
}
