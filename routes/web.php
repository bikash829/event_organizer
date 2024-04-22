<?php

use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('welcome');
// });

Auth::routes();
// Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('something_else');


Route::get('/', function () {
    return view('home');
})->name('home');