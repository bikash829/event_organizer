<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\About\AboutController;

// use App\Models\Blog;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Service\ServiceController;
use App\Http\Controllers\Blog\BlogController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\AdminController;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\User\UserController;

use App\Http\Controllers\Service\ServiceCategoryController; // controller for service category

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
//Manager users 
// prefix 
Route::prefix('admin')->group(function () {
    Route::get('/user/pending', [AdminController::class, 'pendingSeller'])->name('admin.pendingSeller');
    Route::get('/user/all-seller', [AdminController::class, 'allSeller'])->name('admin.allSeller');
    Route::get('/user/all-user', [AdminController::class, 'allUser'])->name('admin.allUser');
    Route::get('/user/all-blocked-user', [AdminController::class, 'blockedUsers'])->name('admin.blockedUsers');
    Route::get('/user/{user}', [AdminController::class, 'viewUser'])->name('admin.viewUser');
    Route::get('/user/{user}/block', [AdminController::class, 'blockUser'])->name('admin.blockUser');
    Route::get('/user/{user}/unblock', [AdminController::class, 'unblockUser'])->name('admin.unblockUser');
    Route::get('/user/{user}/delete', [AdminController::class, 'deleteUser'])->name('admin.deleteUser');
    Route::resource('admin', AdminController::class);


    Route::get('/service-category/{category}/disable', [ServiceCategoryController::class, 'disableCategory'])->name('disableCategory');
    Route::get('/service-category/{category}/enable', [ServiceCategoryController::class, 'enableCategory'])->name('enableCategory');

    Route::resources([
        '/service-category' => ServiceCategoryController::class,
    ]);
});



// Route::resource('/admin/user', UserController::class)->name('admin');
// Route::get('/admin/user/all-user', [AdminController::class, 'pendingSeller'])->name('admin.allUser');
// Route::resource('admin', AdminController::class);

// Route::get('/admin/service-category', [ServiceCategoryController::class, 'index'])->name('admin.serviceCategory');


// prefix 






// User resource route
Route::resource('user', UserController::class);