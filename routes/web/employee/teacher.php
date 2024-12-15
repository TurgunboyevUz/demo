<?php

use App\Http\Controllers\Employee\Teacher\FileController;
use App\Http\Controllers\Employee\Teacher\PageController;
use App\Http\Controllers\Employee\Teacher\ReviewController;
use Illuminate\Support\Facades\Route;

Route::get('dashboard', [PageController::class, 'dashboard']);

Route::get('article', [PageController::class, 'article']);
Route::get('scholarship', [PageController::class, 'scholarship']);
Route::get('invention', [PageController::class, 'invention']);
Route::get('startup', [PageController::class, 'startup']);
Route::get('grand-economy', [PageController::class, 'grand_economy']);
Route::get('olympics', [PageController::class, 'olympics']);
Route::get('lang-certificate', [PageController::class, 'lang_certificate']);
Route::get('distinguished-scholarship', [PageController::class, 'distinguished_scholarship']);
Route::get('achievement', [PageController::class, 'achievement']);
Route::get('chat', [PageController::class, 'chat']);
Route::get('student-list', [PageController::class, 'student_list']);
Route::get('create-task', [PageController::class, 'create_task']);

Route::post('article/review', [ReviewController::class, 'article']);
Route::post('scholarship/review', [ReviewController::class, 'scholarship']);
Route::post('invention/review', [ReviewController::class, 'invention']);
Route::post('startup/review', [ReviewController::class, 'startup']);
Route::post('grand-economy/review', [ReviewController::class, 'grand_economy']);
Route::post('olympics/review', [ReviewController::class, 'olympics']);
Route::post('lang-certificate/review', [ReviewController::class, 'lang_certificate']);
Route::post('achievement/review', [ReviewController::class, 'achievement']);

Route::post('create-task', [FileController::class, 'create_task']);