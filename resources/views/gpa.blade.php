@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <div class="card shadow-lg">
        <div class="card-header bg-primary text-white text-center">
            <h3>🎓 GPA Simulator</h3>
        </div>
        <div class="card-body">
            <p class="text-muted">Select your grades for each course to calculate your GPA.</p>

            <table class="table table-bordered text-center align-middle">
                <thead class="table-dark">
                    <tr>
                        <th>Course Code</th>
                        <th>Course Title</th>
                        <th>Credit Hours</th>
                        <th>Grade</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($courses as $course)
                    <tr>
                        <td>{{ $course['code'] }}</td>
                        <td>{{ $course['title'] }}</td>
                        <td class="credit">{{ $course['credit'] }}</td>
                        <td>
                            <select class="form-select grade">
                                <option value="4">A</option>
                                <option value="3.7">A-</option>
                                <option value="3.3">B+</option>
                                <option value="3">B</option>
                                <option value="2.7">B-</option>
                                <option value="2.3">C+</option>
                                <option value="2">C</option>
                                <option value="1.7">C-</option>
                                <option value="1">D</option>
                                <option value="0">F</option>
                            </select>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>

            <div class="d-grid">
                <button class="btn btn-success" onclick="calculateGPA()">Calculate GPA</button>
            </div>

            <div id="resultBox" class="alert alert-info mt-4 text-center d-none">
                <strong>Your GPA:</strong> <span id="gpaResult"></span>
            </div>
        </div>
    </div>
</div>

<script>
function calculateGPA() {
    const rows = document.querySelectorAll("tbody tr");
    let totalCredits = 0;
    let totalPoints = 0;

    rows.forEach(row => {
        const credit = parseFloat(row.querySelector(".credit").innerText);
        const grade = parseFloat(row.querySelector(".grade").value);

        totalCredits += credit;
        totalPoints += (credit * grade);
    });

    const gpa = (totalPoints / totalCredits).toFixed(2);

    document.getElementById("resultBox").classList.remove("d-none");
    document.getElementById("gpaResult").innerText = gpa;
}
</script>
@endsection
