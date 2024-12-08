<?php

use Illuminate\Support\Facades\Route;

Route::get('/login');

Route::get('/student/login', [AuthController::class, 'student_url'])->name('student.login');
Route::get('/employee/login', [AuthController::class, 'employee_url'])->name('employee.login');

Route::get('/student/oauth', [AuthController::class, 'student_callback'])->name('student.oauth');
Route::get('/employee/oauth', [AuthController::class, 'employee_callback'])->name('employee.oauth');