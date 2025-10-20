@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <h2 class="text-primary mb-4">➕ Add New Question</h2>

    <form action="{{ route('questions.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label>Question</label>
            <input type="text" name="question" class="form-control" required>
        </div>

        @foreach (['A','B','C','D'] as $opt)
        <div class="mb-3">
            <label>Option {{ $opt }}</label>
            <input type="text" name="option_{{ strtolower($opt) }}" class="form-control" required>
        </div>
        @endforeach

        <div class="mb-3">
            <label>Correct Option</label>
            <select name="correct_option" class="form-select" required>
                <option value="">-- Select Correct Option --</option>
                <option value="A">A</option>
                <option value="B">B</option>
                <option value="C">C</option>
                <option value="D">D</option>
            </select>
        </div>

        <button class="btn btn-success w-100">Save Question</button>
    </form>
</div>
@endsection
