@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <h2 class="text-center text-primary mb-4">🎯 Start Exam</h2>

    <form action="{{ route('exam.submit') }}" method="POST">
        @csrf

        @foreach ($questions as $q)
        <div class="card mb-3">
            <div class="card-body">
                <h5>{{ $loop->iteration }}. {{ $q->question }}</h5>
                @foreach (['A','B','C','D'] as $opt)
                <div>
                    <input type="radio" name="question_{{ $q->id }}" value="{{ $opt }}" id="{{ $q->id.$opt }}">
                    <label for="{{ $q->id.$opt }}">{{ $opt }}) {{ $q->{'option_'.strtolower($opt)} }}</label>
                </div>
                @endforeach
            </div>
        </div>
        @endforeach

        <button class="btn btn-success w-100 mt-3">Submit Exam</button>
    </form>
</div>
@endsection
