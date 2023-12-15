@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            @foreach($subjects as $subject)

                    <div class="col-md-4 mb-4">
                        <div class="card">
                            <div class="card-body">
                                <a href="{{route('subject-test', $subject->id)}}"><h5 class="card-title">{{$subject->name}}</h5></a>
                            </div>
                        </div>
                    </div>

            @endforeach
        </div>
    </div>


@endsection
