@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <h2 class="text-center text-primary mb-4">🧠 All Questions</h2>

    <a href="{{ route('questions.create') }}" class="btn btn-success mb-3">➕ Add New Question</a>
    <a href="{{ route('exam.start') }}" class="btn btn-primary mb-3 float-end">🎯 Start Exam</a>

    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-bordered table-striped text-center">
        <thead class="table-dark">
            <tr>
                <th>ID</th>
                <th>Question</th>
                <th>Correct Option</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($questions as $question)
            <tr>
                <td>{{ $question->id }}</td>
                <td>{{ $question->question }}</td>
                <td>{{ $question->correct_option }}</td>
                <td>
                    <a href="{{ route('questions.edit', $question->id) }}" class="btn btn-warning btn-sm">✏️ Edit</a>
                    <form action="{{ route('questions.destroy', $question->id) }}" method="POST" class="d-inline">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-danger btn-sm" onclick="return confirm('Delete this question?')">🗑️ Delete</button>
                    </form>
                </td>
            </tr>
            @empty
            <tr><td colspan="4" class="text-muted">No questions yet.</td></tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection
