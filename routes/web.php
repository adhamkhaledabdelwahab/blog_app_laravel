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

Route::get('create-category', [CategoryController::class, 'create']);
Route::post('post-category-form', [CategoryController::class, 'store']);
Route::get('all-categories', [CategoryController::class, 'index']);
Route::get('edit-category/{id}', [CategoryController::class, 'edit']);
Route::post('update-category/{id}', [CategoryController::class, 'update']);
Route::get('delete-category/{id}', [CategoryController::class, 'destroy']);

/// End Category Routes

/// Start Blog Post Routes

Route::get('get-blog-post-form', [BlogPostController::class, 'create']);
Route::post('store-blog-post', [BlogPostController::class, 'store']);
Route::get('all-blog-posts', [BlogPostController::class, 'index']);
Route::get('edit-blog-post/{id}', [BlogPostController::class, 'edit']);
Route::post('update-blog-post/{id}', [BlogPostController::class, 'update']);
Route::get('delete-blog-post/{id}', [BlogPostController::class, 'destroy']);

/// End Blog Post Routes
