<?php

use App\Models\User;
use App\Utils\Hemis;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/hemis', function () {
    $user = User::find(1);
    $hemis = new Hemis(config('oauth.token'));

    dd($hemis->employee(
        $user->hemis_id,
        $user->passport_pin,
        $user->passport_number,
    ));
});

require_once __DIR__.'/student/student.php';
require_once __DIR__.'/employee/employee.php';

require_once __DIR__.'/basic/auth.php';
require_once __DIR__.'/basic/rename.php';
