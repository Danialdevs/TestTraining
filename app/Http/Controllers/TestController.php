<?php

namespace App\Http\Controllers;

use App\Models\Question;
use App\Models\Subjects;
use App\Models\Test;
use App\Models\User;
use App\Models\UserAnswer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class TestController extends Controller
{
    public function subjects()
    {
        $subjects = Subjects::all();
        return view('pages.subjects.all', compact('subjects'));
    }
    public function subjectTests($id){
        $subject = Subjects::where('id', $id)->firstOrFail();
        $tests = Test::where('subject_id', $subject->id)->get();
        return view('pages.subjects.test', compact('subject', 'tests'));
    }
    public function test($id, $q_id) {
        $test = Test::where('id', $id)->firstOrFail();
        $question = Question::where('id', $q_id)->firstOrFail();

        // Получение ответа пользователя для текущего вопроса (если существует)
        $userAnswer = UserAnswer::where('question_id', $q_id)
            ->where('test_id', $id)
            ->where('user_id', Auth::id())
            ->first();

        // Передача ответа пользователя в представление
        return view('pages.tests.test', compact('test', 'question', 'userAnswer'));
    }

    public function testAnswer(Request $request){
        $question_id = $request->question_id;
        $test_id = $request->test_id;
        $answer_id = $request->answer_id;
        $redirect = $request->redirect;
        $user_id  = Auth::id();

        $firstid = Question::where('test_id', $test_id)
            ->min('id');

        $endid = Question::where('test_id', $test_id)
            ->max('id');

        // Ограничение id в пределах 19-25
        if (($question_id < $firstid || $question_id > $endid) && ($redirect == '+' || $redirect == '-')) {
            return redirect()->back()->with('error', 'Недопустимый номер вопроса');
        }

        $userAnswer = UserAnswer::updateOrCreate(
            [
                'question_id' => $question_id,
                'test_id' => $test_id,
                'user_id' => $user_id,
            ],
            ['answer_id' => $answer_id]
        );

        // Сохранение изменений в базе данных
        $userAnswer->save();
        if($redirect == '+'){
            return redirect()->route('test-start', ['id' => $test_id, 'q_id' => $question_id + 1]);

        }else{
            return redirect()->route('test-start', ['id' => $test_id, 'q_id' => $question_id - 1]);

        }

    }

    public function showResults($id)
    {
        $test = Test::where('id', $id)->firstOrFail();

        $userIds = UserAnswer::where('test_id', $id)->pluck('user_id')->toArray();
        $users = User::whereIn('id', $userIds)->get();

        return view('pages.tests.results', compact('test', 'users'));
    }


}
