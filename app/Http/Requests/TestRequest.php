<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TestRequest extends FormRequest
{
    public function rules()
    {
        return [
            'name' => ['required'],
            'subject_id' => ['required', 'integer'],
            'user_id' => ['required', 'integer'],
            'school_id' => ['required'],
            'slug' => ['required'],
            'description' => ['required'],
        ];
    }

    public function authorize()
    {
        return true;
    }
}
