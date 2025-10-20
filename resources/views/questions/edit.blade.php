@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <h2 class="text-primary mb-4">✏️ Edit Question</h2>

    <form action="{{ route('questions.update', $question->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label>Question</label>
            <input type="text" name="question" value="{{ $question->question }}" class="form-control" required>
        </div>

        @foreach (['A','B','C','D'] as $opt)
        <div class="mb-3">
            <label>Option {{ $opt }}</label>
            <input type="text" name="option_{{ strtolower($opt) }}" 
                   value="{{ $question->{'option_'.strtolower($opt)} }}" 
                   class="form-control" required>
        </div>
        @endforeach

        <div class="mb-3">
            <label>Correct Option</label>
            <select name="correct_option" class="form-select" required>
                @foreach (['A','B','C','D'] as $opt)
                    <option value="{{ $opt }}" {{ $question->correct_option == $opt ? 'selected' : '' }}>
                        {{ $opt }}
                    </option>
                @endforeach
            </select>
        </div>

        <button class="btn btn-primary w-100">Update</button>
    </form>
</div>
@endsection
