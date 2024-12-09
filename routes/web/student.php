<?php

use Illuminate\Support\Facades\Route;

$routes = function () {
    Route::get('dashboard', []);

    Route::get('article');
    Route::get('');
};

Route::prefix('student')->middleware(['auth', 'role:student'])->group($routes);