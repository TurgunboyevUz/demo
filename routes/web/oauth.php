<?php

use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;

Route::get('/login');

Route::get('/student/login', [AuthController::class, 'student_url'])->name('student.login');
Route::get('/employee/login', [AuthController::class, 'employee_url'])->name('employee.login');

Route::get('/{type}/oauth', [AuthController::class, 'callback']);
Route::get('/{type}/oauth', [AuthController::class, 'callback']);