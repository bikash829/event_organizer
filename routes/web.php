<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\About\AboutController;

// use App\Models\Blog;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Service\ServiceController;
use App\Http\Controllers\Blog\BlogController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\AdminController;

// Route::get('/', function () {
//     return view('welcome');
// });

Auth::routes(['verify' => true]);

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/', [HomeController::class, 'index'])->name('home');
// Route::get('/', function () {
//     return view('home');
// })->name('home');

Route::get('/about', [AboutController::class, 'index'])->name('about');


// Route for services 
Route::resource('services', ServiceController::class);

// Route for blogs
Route::resource('blogs', BlogController::class);

// Route for FAQ
Route::get('/faq', function () {
    return view('faq');
})->name('faq');


// Route for contact
Route::resource('contact', ContactController::class);




//admin routes 
// make resource route for admin 
Route::resource('/admin', AdminController::class);