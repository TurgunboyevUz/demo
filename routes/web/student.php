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

};

Route::prefix('student')->middleware(['auth', 'role:student'])->group($routes);