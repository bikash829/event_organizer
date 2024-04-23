<?php

use Illuminate\Support\Facades\Route;
<<<<<<< HEAD
use App\Http\Controllers\BlogController;
=======
>>>>>>> version2

Route::get('/', function () {
    return view('welcome');
});
<<<<<<< HEAD

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::resource('/blogs', BlogController::class)->names('blogs');
=======
>>>>>>> version2
