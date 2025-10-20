@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <h2 class="text-primary mb-4">➕ Add New Grade</h2>

    <form action="{{ route('grades.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label>Course Code</label>
            <input type="text" name="course_code" class="form-control" required>
        </div>

        <div class="mb-3">
            <label>Course Name</label>
            <input type="text" name="course_name" class="form-control" required>
        </div>

        <div class="mb-3">
            <label>Credit Hours</label>
            <input type="number" name="credit_hours" class="form-control" required>
        </div>

        <div class="mb-3">
            <label>Grade</label>
            <select name="grade" class="form-select" required>
                <option value="">-- Select Grade --</option>
                <option value="A+">A+</option>
                <option value="A">A</option>
                <option value="B+">B+</option>
                <option value="B">B</option>
                <option value="C+">C+</option>
                <option value="C">C</option>
                <option value="D">D</option>
                <option value="F">F</option>
            </select>
        </div>

        <div class="mb-3">
            <label>Term</label>
            <input type="text" name="term" class="form-control" required placeholder="e.g. Term 1">
        </div>

        <button class="btn btn-success w-100">Save</button>
    </form>
</div>
@endsection
