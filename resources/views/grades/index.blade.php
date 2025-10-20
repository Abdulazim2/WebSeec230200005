@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <h2 class="text-center text-primary mb-4">🎓 Student Grades</h2>

    <a href="{{ route('grades.create') }}" class="btn btn-success mb-3">➕ Add Grade</a>

    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-bordered table-striped text-center">
        <thead class="table-dark">
            <tr>
                <th>#</th>
                <th>Course Code</th>
                <th>Course Name</th>
                <th>Credit Hours</th>
                <th>Grade</th>
                <th>Term</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($grades as $grade)
            <tr>
                <td>{{ $grade->id }}</td>
                <td>{{ $grade->course_code }}</td>
                <td>{{ $grade->course_name }}</td>
                <td>{{ $grade->credit_hours }}</td>
                <td>{{ $grade->grade }}</td>
                <td>{{ $grade->term }}</td>
                <td>
                    <a href="{{ route('grades.edit', $grade->id) }}" class="btn btn-warning btn-sm">✏️ Edit</a>
                    <form action="{{ route('grades.destroy', $grade->id) }}" method="POST" class="d-inline">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-danger btn-sm" onclick="return confirm('Are you sure?')">🗑️ Delete</button>
                    </form>
                </td>
            </tr>
            @empty
            <tr><td colspan="7" class="text-muted">No grades found.</td></tr>
            @endforelse
        </tbody>
    </table>

    <div class="text-end mt-3">
        <h4 class="text-success">📘 GPA: {{ $gpa }}</h4>
    </div>
</div>
@endsection
