<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

require_once __DIR__ . '/dev/student.php';
require_once __DIR__ . '/dev/employee.php';