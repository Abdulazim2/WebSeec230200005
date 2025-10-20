<?php

namespace App\Http\Controllers;

use App\Models\Question;
use Illuminate\Http\Request;

class QuestionController extends Controller
{
    // عرض جميع الأسئلة
    public function index()
    {
        $questions = Question::all();
        return view('questions.index', compact('questions'));
    }

    // صفحة إضافة سؤال جديد
    public function create()
    {
        return view('questions.create');
    }

    // حفظ السؤال الجديد
    public function store(Request $request)
    {
        $request->validate([
            'question' => 'required|string',
            'option_a' => 'required|string',
            'option_b' => 'required|string',
            'option_c' => 'required|string',
            'option_d' => 'required|string',
            'correct_option' => 'required|string|in:A,B,C,D',
        ]);

        Question::create($request->all());
        return redirect()->route('questions.index')->with('success', 'Question added successfully!');
    }

    // صفحة التعديل
    public function edit(Question $question)
    {
        return view('questions.edit', compact('question'));
    }

    // تحديث السؤال
    public function update(Request $request, Question $question)
    {
        $request->validate([
            'question' => 'required|string',
            'option_a' => 'required|string',
            'option_b' => 'required|string',
            'option_c' => 'required|string',
            'option_d' => 'required|string',
            'correct_option' => 'required|string|in:A,B,C,D',
        ]);

        $question->update($request->all());
        return redirect()->route('questions.index')->with('success', 'Question updated successfully!');
    }

    // حذف السؤال
    public function destroy(Question $question)
    {
        $question->delete();
        return redirect()->route('questions.index')->with('success', 'Question deleted successfully!');
    }

    // صفحة الامتحان
    public function exam()
    {
        $questions = Question::all();
        return view('questions.exam', compact('questions'));
    }

    // حساب النتيجة بعد الامتحان
    public function submitExam(Request $request)
    {
        $score = 0;
        $questions = Question::all();

        foreach ($questions as $q) {
            if (isset($request['question_'.$q->id]) && $request['question_'.$q->id] == $q->correct_option) {
                $score++;
            }
        }

        return view('questions.result', [
            'score' => $score,
            'total' => count($questions)
        ]);
    }
}
