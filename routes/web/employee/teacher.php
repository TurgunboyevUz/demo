<?php

use App\Http\Controllers\Employee\Teacher\FileController;
use App\Http\Controllers\Employee\Teacher\PageController;
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

Route::post('article', [PageController::class, 'article']);
Route::post('scholarship', [PageController::class, 'scholarship']);
Route::post('invention', [PageController::class, 'invention']);
Route::post('startup', [PageController::class, 'startup']);
Route::post('grand-economy', [PageController::class, 'grand_economy']);
Route::post('olympics', [PageController::class, 'olympics']);
Route::post('lang-certificate', [PageController::class, 'lang_certificate']);
Route::post('distinguished-scholarship', [PageController::class, 'distinguished_scholarship']);
Route::post('achievement', [PageController::class, 'achievement']);
Route::post('create-task', [FileController::class, 'create_task']);