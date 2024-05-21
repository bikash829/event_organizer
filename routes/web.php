<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\About\AboutController;

// use App\Models\Blog;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Service\ServiceController; // Service controller 
use App\Http\Controllers\Blog\BlogController; // blog controller
use App\Http\Controllers\Blog\UserBlogController; // blog controller
use App\Http\Controllers\Blog\BlogCommentController; // blog comment controller 

use App\Http\Controllers\ContactController; // contact us controller 
use App\Http\Controllers\AdminController; // admin controller 
use Illuminate\Support\Facades\Auth; // Auth controller 
use App\Http\Controllers\User\UserController; // User controller 

use App\Http\Controllers\Service\ServiceCategoryController; // controller for service category

// Route::get('/', function () {
//     return view('welcome');
// });


Auth::routes(['verify' => true]);

// ______________Route for home
Route::get('/', [HomeController::class, 'index'])->name('home');

// ______________Route for about
Route::get('/about', [AboutController::class, 'index'])->name('about');


// --------------Route for services 
Route::resource('services', ServiceController::class);



// ______________Route for blogs
Route::resource('blog', BlogController::class)->only(['index', 'show']);
Route::resource('blog.comment', BlogCommentController::class);
// Authenticated user can create blog
Route::resource('blog', BlogController::class)->except(['index', 'show']);
Route::middleware(['auth',])->prefix('user')->name('user.')->group(function () {
    Route::resource('blog',UserBlogController::class);
    Route::resource('blog.comment', BlogCommentController::class);
});




// _____________Route for like and comment
Route::group(['middleware' => 'auth'], function () {
    Route::get('/blog-like/{blog}', [BlogController::class, 'like'])->name('blog.like');
    Route::get('/comment-like/{blogComment}', [BlogCommentController::class, 'like'])->name('blogComment.like');

});



// --------------Route for FAQ
Route::get('/faq', function () {
    return view('faq');
})->name('faq');


// Route for contact
Route::resource('contact', ContactController::class)->only(['index', 'store']);




//________________Route for admin
//Manager users 
// prefix 
Route::prefix('admin')->name('admin.')->group(function () {
    Route::get('/user/pending', [AdminController::class, 'pendingVendor'])->name('pendingVendor');
    Route::get('/user/all-Vendor', [AdminController::class, 'allVendor'])->name('allVendor');
    Route::get('/user/all-user', [AdminController::class, 'allUser'])->name('allUser');
    Route::get('/user/all-blocked-user', [AdminController::class, 'blockedUsers'])->name('blockedUsers');
    Route::get('/user/{user}', [AdminController::class, 'viewUser'])->name('viewUser');
    Route::get('/user/{user}/block', [AdminController::class, 'blockUser'])->name('blockUser');
    Route::get('/user/{user}/unblock', [AdminController::class, 'unblockUser'])->name('unblockUser');
    Route::get('/user/{user}/delete', [AdminController::class, 'deleteUser'])->name('deleteUser');


    Route::get('/service-category/{category}/disable', [ServiceCategoryController::class, 'disableCategory'])->name('disableCategory');
    Route::get('/service-category/{category}/enable', [ServiceCategoryController::class, 'enableCategory'])->name('enableCategory');

    Route::resources([
        'service-category' => ServiceCategoryController::class,
    ]);
});

Route::resource('admin', AdminController::class);



// ____________________Route for user
Route::resource('user', UserController::class);






