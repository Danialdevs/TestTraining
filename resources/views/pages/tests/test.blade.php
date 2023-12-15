@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="row">
            <!-- Right Sidebar Navigation -->
            <div class="col-md-3">
                <!-- Display questions as navigation links -->
                <ul class="list-group">

                    @foreach($test->questions as $index => $questionx)
                        <li class="list-group-item {{ endanswer($questionx->id) ? 'bg-success text-white' : '' }}">
                                {{ $index + 1 }}. {{ $questionx->question }}
                        </li>
                    @endforeach
                        <li class="list-group-item">
                            отчет
                        </li>
                </ul>
            </div>



            <!-- Left Content Area -->
            <div class="col-md-9">
                <div class="card">
                    <div class="card-header">
                        <h2 class="card-title">{{ $test->name }}</h2>
                    </div>
                    <div class="card-body">
                        <p class="card-text">Description: {{ $test->description }}</p>

                        <!-- Test Content -->
                        <div id="questionContainer">
                            <!-- Display the selected question here -->
                            <h3>{{ $question->question }}</h3>
                            <form method="POST" action="{{ route('test-answer') }}">
                                @csrf
                                <input type="hidden" name="question_id" value="{{ $question->id }}">
                                <input type="hidden" name="test_id" value="{{ $test->id }}">
                                <ul class="list-group">
                                    @foreach($question->answers as $answer)
                                        <li class="list-group-item">
                                            <label class="form-check-label">
                                                <input type="radio" name="answer_id" value="{{ $answer->id }}"
                                                       @if(isset($userAnswer) && $userAnswer->answer_id == $answer->id) checked @endif>
                                                {{ $answer->content }}
                                            </label>
                                        </li>
                                    @endforeach
                                </ul>
                                <br>
                                @if ($question->id != $test->questions->min('id')) <!-- Не первый вопрос -->
                                <button type="submit" name="redirect" value="-" class="btn btn-primary">Предыдущий</button>
                                @endif

                                @if ($question->id != $test->questions->max('id')) <!-- Не последний вопрос -->
                                <button type="submit" name="redirect" value="+" class="btn btn-primary">Следующий</button>
                                @endif
                            </form>



                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
