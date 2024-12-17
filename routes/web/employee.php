<?php

use Illuminate\Support\Facades\Route;

Route::prefix('employee')->middleware(['auth', 'role:teacher|dean|inspector'])->group(function () {
    Route::prefix('teacher')->middleware(['auth', 'role:teacher'])->group(function () {
        require_once __DIR__.'/employee/teacher.php';
    });

    Route::prefix('dean')->middleware(['auth', 'role:dean'])->group(function () {
        require_once __DIR__.'/employee/dean.php';
    });

    Route::prefix('inspector')->middleware(['auth', 'role:inspector'])->group(function () {
        require_once __DIR__.'/employee/inspector.php';
    });
});
