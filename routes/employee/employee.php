<?php

use Illuminate\Support\Facades\Route;

Route::prefix('employee')->middleware(['auth', 'role:teacher|dean|inspector'])->group(function () {
    Route::prefix('teacher')->middleware(['auth', 'role:teacher'])->group(function () {
        require_once __DIR__.'/teacher.php';
    });

    Route::prefix('dean')->middleware(['auth', 'role:dean'])->group(function () {
        require_once __DIR__.'/dean.php';
    });

    Route::prefix('inspeksiya')->middleware(['auth', 'role:inspeksiya'])->group(function () {
        require_once __DIR__.'/inspeksiya.php';
    });

    Route::prefix('talent')->middleware(['auth', 'role:talent'])->group(function () {
        require_once __DIR__.'/talent.php';
    });
});