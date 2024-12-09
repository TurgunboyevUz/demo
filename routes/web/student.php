<?php

use App\Http\Controllers\Student\PageController;
use Illuminate\Support\Facades\Route;

$routes = function () {
    Route::get('dashboard', [PageController::class, 'dashboard']);

    Route::get('article', [PageController::class, 'article']);
    Route::get('assignments', [PageController::class, 'assignments']);
    Route::get('scholarship', [PageController::class, 'scholarship']);
    Route::get('invention', [PageController::class, 'invention']);
    Route::get('startup', [PageController::class, 'startup']);
    Route::get('grand-economy', [PageController::class, 'grand_economy']);
    Route::get('olympics', [PageController::class, 'olympics']);
    Route::get('lang-certificate', [PageController::class, 'lang_certificate']);
    Route::get('distinguished-scholarship', [PageController::class, 'distinguished_scholarship']);
    Route::get('achievement', [PageController::class, 'achievement']);
    Route::get('evaluation-criteria', [PageController::class, 'evaluation_criteria']);
    Route::get('chat', [PageController::class, 'chat']);

    Route::post('article/store', [PageController::class, 'store']);
    Route::post('scholarship/store', [PageController::class, 'scholarship_store']);
    Route::post('invention/store', [PageController::class, 'invention_store']);
    Route::post('startup/store', [PageController::class, 'startup_store']);
    Route::post('grand-economy/store', [PageController::class, 'grand_economy_store']);
    Route::post('olympics/store', [PageController::class, 'olympics_store']);
    Route::post('lang-certificate/store', [PageController::class, 'lang_certificate_store']);
    Route::post('distinguished-scholarship/store', [PageController::class, 'distinguished_scholarship_store']);
    Route::post('achievement/store', [PageController::class, 'achievement_store']);
    Route::post('evaluation-criteria/store', [PageController::class, 'evaluation_criteria_store']);
    Route::post('chat/store', [PageController::class, 'chat_store']);
};

Route::prefix('student')->middleware(['auth', 'role:student'])->group($routes);