@extends('layouts.app')

@section('content')
<div class="container mt-4 text-center">
    <h2 class="text-success">✅ Exam Finished!</h2>
    <h4 class="mt-3">You got <span class="text-primary">{{ $score }}</span> out of <span class="text-dark">{{ $total }}</span></h4>

    <div class="mt-4">
        <a href="{{ route('exam.start') }}" class="btn btn-info">🌀 Retake Exam</a>
        <a href="{{ route('questions.index') }}" class="btn btn-secondary">⬅️ Back to Questions</a>
    </div>
</div>
@endsection
