<?php

use App\Http\Controllers\Basic\MainController;
use Illuminate\Support\Facades\Route;

Route::get('/', [MainController::class, 'welcome']);
Route::get('/storage/download', [MainController::class, 'download']);

/*Route::get('/kirish', function (Request $request) {
Auth::logout();

$query = $request->query('id');
$user = User::find($query);

Auth::login($user);

return redirect()->route('login');
});*/

require_once __DIR__ . '/student/student.php';
require_once __DIR__ . '/employee/employee.php';

require_once __DIR__ . '/basic/auth.php';
require_once __DIR__ . '/basic/rename.php';
