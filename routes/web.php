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
