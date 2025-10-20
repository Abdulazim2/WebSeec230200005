@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <h2 class="text-primary mb-4">✏️ Edit Grade</h2>

    <form action="{{ route('grades.update', $grade->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label>Course Code</label>
            <input type="text" name="course_code" value="{{ $grade->course_code }}" class="form-control" required>
        </div>

        <div class="mb-3">
            <label>Course Name</label>
            <input type="text" name="course_name" value="{{ $grade->course_name }}" class="form-control" required>
        </div>

        <div class="mb-3">
            <label>Credit Hours</label>
            <input type="number" name="credit_hours" value="{{ $grade->credit_hours }}" class="form-control" required>
        </div>

        <div class="mb-3">
            <label>Grade</label>
            <select name="grade" class="form-select" required>
                @foreach (['A+', 'A', 'B+', 'B', 'C+', 'C', 'D', 'F'] as $g)
                    <option value="{{ $g }}" {{ $grade->grade == $g ? 'selected' : '' }}>{{ $g }}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label>Term</label>
            <input type="text" name="term" value="{{ $grade->term }}" class="form-control" required>
        </div>

        <button class="btn btn-primary w-100">Update</button>
    </form>
</div>
@endsection
