<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

require_once __DIR__.'/student/student.php';
require_once __DIR__.'/employee/employee.php';

require_once __DIR__.'/basic/auth.php';
require_once __DIR__.'/basic/rename.php';
