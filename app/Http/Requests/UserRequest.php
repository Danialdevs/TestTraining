<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
{
    public function rules()
    {
        return [
            'username' => ['required', 'string', 'max:50', 'min:3'],
            'email' => ['required', 'email'],
            'password' => ['required', 'string'],
        ];
    }

    public function authorize()
    {
        return true;
    }
}
