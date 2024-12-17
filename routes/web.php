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

    dd($hemis->employee_list([
        'type' => 'all',
        'passport_pin' => $user->passport_pin,
        'passport_number' => $user->passport_number,
    ]));
});

require_once __DIR__.'/web/student.php';
require_once __DIR__.'/web/employee.php';
require_once __DIR__.'/web/admin.php';

require_once __DIR__.'/web/basic/auth.php';
require_once __DIR__.'/web/basic/rename.php';
