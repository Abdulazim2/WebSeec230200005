@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <h2 class="text-center text-primary mb-4">Student Transcript</h2>

    <div class="card shadow-sm mb-4">
        <div class="card-body">
            <h5><strong>Name:</strong> {{ $student['name'] }}</h5>
            <h5><strong>ID:</strong> {{ $student['id'] }}</h5>
            <h5><strong>Department:</strong> {{ $student['department'] }}</h5>
            <h5><strong>Semester:</strong> {{ $student['semester'] }}</h5>
        </div>
    </div>

    <table class="table table-bordered table-striped text-center">
        <thead class="table-dark">
            <tr>
                <th>Course Code</th>
                <th>Course Title</th>
                <th>Credit Hours</th>
                <th>Grade</th>
            </tr>
        </thead>
        <tbody>
            @php $totalCredits = 0; @endphp
            @foreach ($courses as $course)
                <tr>
                    <td>{{ $course['code'] }}</td>
                    <td>{{ $course['title'] }}</td>
                    <td>{{ $course['credit'] }}</td>
                    <td>{{ $course['grade'] }}</td>
                </tr>
                @php $totalCredits += $course['credit']; @endphp
            @endforeach
        </tbody>
        <tfoot class="table-secondary">
            <tr>
                <td colspan="2" class="text-end"><strong>Total Credit Hours:</strong></td>
                <td colspan="2"><strong>{{ $totalCredits }}</strong></td>
            </tr>
        </tfoot>
    </table>
</div>
@endsection
