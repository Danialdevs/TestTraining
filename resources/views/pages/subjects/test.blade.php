<!-- resources/views/pages/subjects/test.blade.php -->

@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>Тесты по предмету {{ $subject->name }}  </h2>
        <div class="row">
            @foreach($tests as $test)
                <div class="col-md-6 mb-4">
                    <div class="card">
                        <div class="card-body">
                            <a href="{{ route('test-start', ['id' => $test->id, 'q_id' => $test->questions->first->id]) }}">
                               <h5 class="card-title">{{ $test->name }}</h5>
                               <p class="card-text">{{ $test->description }}</p>
                           </a>
                            <a href="{{ route('test-results', ['id' => $test->id]) }}">
                                <button class="btn btn-primary">Результаты для учителья</button>
                            </a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
