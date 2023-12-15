<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class QuestionRequest extends FormRequest
{
    public function rules()
    {
        return [
            'test_id' => ['required', 'integer'],
            'question' => ['required'],
        ];
    }

    public function authorize()
    {
        return true;
    }
}
