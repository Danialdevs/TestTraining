<?php
function countResult($test_id, $user_id){
    $userAnswers = \App\Models\UserAnswer::where('test_id', $test_id)
        ->where('user_id', $user_id)
        ->get();

    $count = 0;

    foreach ($userAnswers as $userAnswer) {
        if ($userAnswer->answer && $userAnswer->answer->answer) {
            $count++;
        }
    }

    return $count;
}
function endanswer($question_id){
    $userAnswer = \App\Models\UserAnswer::where('question_id', $question_id)
        ->where('user_id', \Illuminate\Support\Facades\Auth::id())
        ->first();

    if(empty($userAnswer)){
        $data = false;
    } else {
        $data = true;
    }

    return $data;
}
