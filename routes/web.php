<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

require_once __DIR__ . '/web/student.php';
require_once __DIR__ . '/web/employee.php';
require_once __DIR__ . '/web/admin.php';

require_once __DIR__ . '/web/basic/auth.php';
require_once __DIR__ . '/web/basic/rename.php';