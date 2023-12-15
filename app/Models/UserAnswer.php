<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UserAnswer extends Model
{
    protected $fillable = ['question_id', 'answer_id', 'user_id', 'test_id'];

    public function answer()
    {
        return $this->belongsTo(Answer::class, 'answer_id', 'id');
    }

}
