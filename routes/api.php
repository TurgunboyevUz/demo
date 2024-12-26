<?php

use App\Http\Controllers\Dean\DeanController;
use Illuminate\Support\Facades\Route;

Route::prefix('dean')->group(function () {
    Route::get('/student-employee', [DeanController::class, 'student_employee']);
    Route::post('/attach-student', [DeanController::class, 'attach_student']);
});
