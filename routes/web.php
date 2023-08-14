<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\BlogPostController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [DashboardController::class, 'index']);


/// Start Category Routes

Route::controller(CategoryController::class)->group(function () {
    Route::get('create-category',  'create');
    Route::post('post-category-form',  'store');
    Route::get('all-categories',  'index');
    Route::get('edit-category/{id}',  'edit');
    Route::post('update-category/{id}',  'update');
    Route::get('delete-category/{id}',  'destroy');
});

/// End Category Routes

/// Start Blog Post Routes

Route::controller(BlogPostController::class)->group(function () {
    Route::get('get-blog-post-form', 'create');
    Route::post('store-blog-post', 'store');
    Route::get('all-blog-posts', 'index');
    Route::get('edit-blog-post/{id}', 'edit');
    Route::post('update-blog-post/{id}', 'update');
    Route::get('delete-blog-post/{id}', 'destroy');
});

/// End Blog Post Routes
