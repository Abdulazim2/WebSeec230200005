<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;

Route::resource('products', ProductController::class);


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application.
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/hello', function () {
    return "Hello, Abdelazim! Laravel is working perfectly 🎉";
});

Route::get('/minitest', function () {
    $bill = [
        ['item' => 'Milk', 'qty' => 2, 'price' => 25],
        ['item' => 'Bread', 'qty' => 1, 'price' => 10],
        ['item' => 'Butter', 'qty' => 1, 'price' => 15],
    ];

    return view('minitest', compact('bill'));

});
Route::get('/transcript', function () {
    $student = [
        'name' => 'Abdelazim Mohamed',
        'id' => '230200005',
        'department' => 'Computer Science',
        'semester' => 'Fall 2025',
    ];

    $courses = [
        ['code' => 'CS101', 'title' => 'Introduction to Programming', 'grade' => 'A', 'credit' => 3],
        ['code' => 'CS102', 'title' => 'Data Structures', 'grade' => 'B+', 'credit' => 3],
        ['code' => 'CS103', 'title' => 'Discrete Math', 'grade' => 'A-', 'credit' => 2],
        ['code' => 'CS104', 'title' => 'Database Systems', 'grade' => 'B', 'credit' => 3],
    ];

    return view('transcript', compact('student', 'courses'));
});
Route::get('/products', function () {
    $products = [
        [
            'name' => 'Laptop Lenovo IdeaPad 3',
            'price' => 18500,
            'image' => 'https://m.media-amazon.com/images/I/71+umk6zTUL._AC_SL1500_.jpg',
            'description' => 'A fast and reliable laptop for everyday use with 8GB RAM and 512GB SSD.'
        ],
        [
            'name' => 'Wireless Mouse Logitech M185',
            'price' => 400,
            'image' => 'https://m.media-amazon.com/images/I/51n7UvQXkLL._AC_SL1500_.jpg',
            'description' => 'Compact and comfortable wireless mouse with long battery life.'
        ],
        [
            'name' => 'Samsung Galaxy A15',
            'price' => 7200,
            'image' => 'https://m.media-amazon.com/images/I/71Je4Gz7b6L._AC_SL1500_.jpg',
            'description' => 'Smartphone with AMOLED display and great battery performance.'
        ],
        [
            'name' => 'Sony WH-CH520 Headphones',
            'price' => 2500,
            'image' => 'https://m.media-amazon.com/images/I/61J6wV1kwrL._AC_SL1500_.jpg',
            'description' => 'Wireless Bluetooth headphones with clear sound and long battery life.'
        ],
    ];

    return view('products', compact('products'));
});
Route::get('/calculator', function () {
    return view('calculator');
});
Route::get('/gpa', function () {
    $courses = [
        ['code' => 'CS101', 'title' => 'Programming Fundamentals', 'credit' => 3],
        ['code' => 'CS102', 'title' => 'Data Structures', 'credit' => 3],
        ['code' => 'CS103', 'title' => 'Database Systems', 'credit' => 2],
        ['code' => 'CS104', 'title' => 'Web Development', 'credit' => 3],
    ];

    return view('gpa', compact('courses'));
});
use App\Http\Controllers\UserController;

Route::resource('users', UserController::class);

use App\Http\Controllers\GradeController;
Route::resource('grades', GradeController::class);
use App\Http\Controllers\QuestionController;

Route::resource('questions', QuestionController::class);

// صفحات الامتحان
Route::get('/exam', [QuestionController::class, 'exam'])->name('exam.start');
Route::post('/exam/submit', [QuestionController::class, 'submitExam'])->name('exam.submit');
