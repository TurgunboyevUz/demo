<?php

use App\Http\Controllers\Talent\ApproveController;
use App\Http\Controllers\Talent\InspectorController;
use App\Http\Controllers\Talent\PageController;
use App\Http\Controllers\Talent\RatingController;
use App\Http\Controllers\Talent\RejectController;
use Illuminate\Support\Facades\Route;

Route::get('dashboard', [PageController::class, 'dashboard']);
Route::post('edit-profile', [InspectorController::class, 'edit_profile']);

Route::get('article', [PageController::class, 'article']);
Route::post('article/approve', [ApproveController::class, 'article']);
Route::post('article/reject', [RejectController::class, 'article']);

Route::prefix('rating')->group(function () {
    Route::get('institute', [RatingController::class, 'institute']);
    Route::get('general-institute', [RatingController::class, 'general_institute']);
});
