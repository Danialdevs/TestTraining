<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AnswerRequest extends FormRequest
{
    public function rules()
    {
        return [
            'content' => ['required'],
            'question_id' => ['required', 'integer'],
            'answer' => ['boolean'],
        ];
    }

    public function authorize()
    {
        return true;
    }
}
