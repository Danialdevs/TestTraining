<!-- results.blade.php -->

@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h2>Results for Test: {{ $test->name }}</h2>
                <table class="table">
                    <thead>
                    <tr>
                        <th>Имя</th>
                        @foreach($test->questions as $index => $question)
                            <th>{{ $index + 1  }}</th>
                        @endforeach
                        <th>итог</th>

                    </tr>
                    </thead>
                    <tbody>
                    @foreach($users as $user)
                        <tr>
                            <td>{{ $user->name }}</td>
                            @foreach($test->questions as $question)
                                <td>
                                    @foreach($user->answers as $answer)
                                        @if($answer->question_id == $question->id)
                                            @if($answer->answer->answer == true)
                                                +1
                                            @else
                                                0
                                            @endif
                                        @endif
                                    @endforeach
                                </td>

                            @endforeach
                            <td>
                                {{countResult($test->id, $user->id)}}/{{$test->questions->count()}}
                            </td>



                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
