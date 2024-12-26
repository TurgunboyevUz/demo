<?php

use App\Http\Controllers\Dean\DeanController;
use App\Http\Controllers\Dean\PageController;
use App\Http\Controllers\Dean\RatingController;
use Illuminate\Support\Facades\Route;

Route::get('dashboard', [PageController::class, 'dashboard']);
Route::get('edit-profile', [PageController::class, 'edit_profile']);

Route::get('attach-student', [PageController::class, 'attach_student']);
Route::get('distinguished-scholarship', [PageController::class, 'distinguished_scholarship']);

Route::post('edit-profile', [DeanController::class, 'edit_profile']);
Route::post('attach-student', [DeanController::class, 'attach_student']);

Route::prefix('rating')->group(function () {
    Route::get('faculty', [RatingController::class, 'faculty']);
    Route::get('institute', [RatingController::class, 'institute']);
    Route::get('general-faculty', [RatingController::class, 'general_faculty']);
    Route::get('general-institute', [RatingController::class, 'general_institute']);
});
