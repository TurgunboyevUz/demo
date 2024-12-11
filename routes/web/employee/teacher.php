<?php

use App\Http\Controllers\Employee\Teacher\PageController;
use Illuminate\Support\Facades\Route;

Route::get('dashboard', [PageController::class, 'dashboard']);