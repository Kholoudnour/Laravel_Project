<?php

use App\Http\Controllers\Admin\TestimonialController as AdminTestimonialController;
use App\Http\Controllers\Admin\TopicController as AdminTopicController;
use App\Http\Controllers\Admin\UserController as AdminUserController;
use App\Http\Controllers\Admin\CategoryController as AdminCategoryController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PublicController;
use App\Http\Controllers\TopicController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AuthController;

// Route::get('/', function () {
//     return view('welcome');
// });

// 'admin' prefix 
Route::prefix('admin') 
    ->controller(AuthController::class)
    ->group(function() {
Route::get('register', [AuthController::class, 'registrationform'])->name('register');
Route::post('register', [AuthController::class, 'register']);
Route::get('login', [AuthController::class, 'loginform'])->name('login');
Route::post('login', [AuthController::class, 'login']);
});

Route::get('index',[PublicController::class,'index'])->name('index');
Route::get('testimonials',[PublicController::class,'testimonials'])->name('testimonials');
Route::get('topics/listing',[PublicController::class,'topicslisting'])->name('topics-listing');
Route::get('category',[PublicController::class,'category'])->name('category');
Route::get('topics/detail',[PublicController::class,'topicsdetail'])->name('topics-detail');
Route::get('contact',[PublicController::class,'contact'])->name('contact');

// 'user' prefix 
Route::prefix('admin') ->name('admin.')
    ->controller(AdminUserController::class)
    ->group(function() {
        Route::get('users/create', 'create')->name('users.create');
        Route::post('users/store', 'store')->name('users.store');
        Route::get('users', 'index')->name('users.index');
        Route::get('users/{id}/edit', 'edit')->name('users.edit')->whereNumber('id');
        Route::put('users/{id}', 'update')->name('users.update');
        Route::delete('users/{id}', 'destroy')->name('users.destroy');
    });
    // 'topic' prefix 
Route::prefix('admin') 
    ->controller(AdminTopicController::class)
    ->group(function() {
        Route::get('topic/create', 'create')->name('topic.create');
        Route::post('topic', 'store')->name('topic.store');
        Route::get('topic', 'index')->name('topic.index');
        Route::get('topic/{id}/edit', 'edit')->name('topic.edit')->whereNumber('id');
        Route::put('topic/{id}', 'update')->name('topic.update');
        Route::delete('topic/{id}', 'destroy')->name('topic.destroy');
    });
// 'testimonial' prefix 
Route::prefix('admin') 
    ->controller(AdminTestimonialController::class)
    ->group(function() {
        Route::get('testimonials/create', 'create')->name('testimonials.create');
        Route::post('testimonials', 'store')->name('testimonials.store');
        Route::get('testimonials', 'index')->name('testimonials.index');
        Route::get('testimonials/{id}/edit', 'edit')->name('testimonials.edit')->whereNumber('id');
        Route::put('testimonials/{id}', 'update')->name('testimonials.update');
        Route::delete('testimonials/{id}', 'destroy')->name('testimonials.destroy');
    });
// 'category' prefix 
Route::prefix('admin') 
    ->controller(AdminCategoryController::class)
    ->group(function() {
        Route::get('categories/create', 'create')->name('categories.create');
        Route::post('categories', 'store')->name('categories.store');
        Route::get('categories', 'index')->name('categories.index');
        Route::get('categories/{id}/edit', 'edit')->name('categories.edit')->whereNumber('id');
        Route::put('categories/{id}', 'update')->name('categories.update');
        Route::delete('categories/{id}', 'destroy')->name('categories.destroy');
    });




Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
