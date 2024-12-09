<?php

use Illuminate\Support\Facades\Route;

Route::prefix('employee')->group(function () {
    Route::get('/teacher/dashboard', function () {
        return 'Dashboard';
    })->name('employee.teacher.dashboard');
})->middleware(['auth', 'role:teacher,dean,inspector']);