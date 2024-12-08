<?php

use Illuminate\Support\Facades\Route;

Route::get('/');

require_once __DIR__ . '/web/oauth.php';
require_once __DIR__ . '/web/student.php';
require_once __DIR__ . '/web/employee.php';