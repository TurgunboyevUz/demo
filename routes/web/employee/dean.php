<?php

use App\Http\Controllers\Employee\Dean\DeanController;
use App\Http\Controllers\Employee\Dean\PageController;
use Illuminate\Support\Facades\Route;

Route::get('dashboard', [PageController::class, 'dashboard']);

Route::get('attach-student', [PageController::class, 'attach_student']);
Route::get('distinguished-scholarship', [PageController::class, 'distinguished_scholarship']);

Route::post('attach-student', [DeanController::class, 'attach_student']);
