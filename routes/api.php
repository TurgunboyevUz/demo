<?php

use App\Http\Controllers\Basic\ChatController;
use App\Http\Controllers\Dean\DeanController;
use Illuminate\Support\Facades\Route;

Route::prefix('dean')->group(function () {
    Route::get('/student-employee', [DeanController::class, 'student_employee']);
    Route::post('/attach-student', [DeanController::class, 'attach_student']);
});

Route::prefix('chat')->middleware(['auth:api'])->group(function () {
   Route::post('/sendMessage', [ChatController::class, 'sendMessage']);
   Route::post('/deleteMessage', [ChatController::class, 'deleteMessage']);

   Route::post('/getMessages', [ChatController::class, 'getMessages']); 
});