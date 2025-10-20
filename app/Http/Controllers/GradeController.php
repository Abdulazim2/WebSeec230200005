<?php

namespace App\Http\Controllers;

use App\Models\Grade;
use Illuminate\Http\Request;

class GradeController extends Controller
{
    // عرض كل الدرجات
    public function index()
    {
        $grades = Grade::all();

        // حساب GPA
        $gpa = $this->calculateGPA($grades);

        return view('grades.index', compact('grades', 'gpa'));
    }

    // صفحة إضافة درجة جديدة
    public function create()
    {
        return view('grades.create');
    }

    // تخزين الدرجة الجديدة
    public function store(Request $request)
    {
        $request->validate([
            'course_code' => 'required|string|max:50',
            'course_name' => 'required|string|max:255',
            'credit_hours' => 'required|integer|min:1',
            'grade' => 'required|string|max:2',
            'term' => 'required|string|max:50',
        ]);

        Grade::create($request->all());
        return redirect()->route('grades.index')->with('success', 'Grade added successfully!');
    }

    // صفحة التعديل
    public function edit(Grade $grade)
    {
        return view('grades.edit', compact('grade'));
    }

    // تحديث البيانات بعد التعديل
    public function update(Request $request, Grade $grade)
    {
        $request->validate([
            'course_code' => 'required|string|max:50',
            'course_name' => 'required|string|max:255',
            'credit_hours' => 'required|integer|min:1',
            'grade' => 'required|string|max:2',
            'term' => 'required|string|max:50',
        ]);

        $grade->update($request->all());
        return redirect()->route('grades.index')->with('success', 'Grade updated successfully!');
    }

    // حذف درجة
    public function destroy(Grade $grade)
    {
        $grade->delete();
        return redirect()->route('grades.index')->with('success', 'Grade deleted successfully!');
    }

    // دالة حساب GPA
    private function calculateGPA($grades)
    {
        if ($grades->isEmpty()) return 0;

        $totalPoints = 0;
        $totalCredits = 0;

        $points = [
            'A+' => 4.0,
            'A' => 4.0,
            'B+' => 3.5,
            'B' => 3.0,
            'C+' => 2.5,
            'C' => 2.0,
            'D' => 1.0,
            'F' => 0.0,
        ];

        foreach ($grades as $grade) {
            $gradeValue = $points[$grade->grade] ?? 0;
            $totalPoints += $gradeValue * $grade->credit_hours;
            $totalCredits += $grade->credit_hours;
        }

        return $totalCredits > 0 ? round($totalPoints / $totalCredits, 2) : 0;
    }
}
