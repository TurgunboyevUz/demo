<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Utils\UserUtil;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function index(Request $request)
    {
        $roles = ['teacher', 'dean', 'inspector', 'admin', 'super_admin'];

        if ($request->user()?->hasRole('student')) {
            return redirect()->route('student.dashboard');
        }

        foreach ($roles as $role) {
            if ($request->user()?->hasRole($role)) {
                return redirect()->route('employee.'.$role.'.dashboard');
            }
        }

        return view('auth.login');
    }

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('login');
    }

    public function url($type)
    {
        $url = oauth()->url($type);

        return redirect($url);
    }

    public function student_url(Request $request)
    {
        if ($request->user()?->hasRole('student')) {
            return redirect()->route('student.dashboard');
        }

        return $this->url('student');
    }

    public function employee_url(Request $request)
    {
        $roles = ['teacher', 'dean', 'inspector', 'admin', 'super_admin'];

        foreach ($roles as $role) {
            if ($request->user()?->hasRole($role)) {
                return redirect()->route('employee.'.$role.'.dashboard');
            }
        }

        return $this->url('employee');
    }

    public function callback(Request $request, $type)
    {
        $auth = oauth()->auth($request, $type);

        if (! $auth) {
            return redirect()->route($type.'.login');
        }

        $util = UserUtil::create($auth['user']);
        $user = $util['user'];
        $redirect = $util['redirect'];

        Auth::login($user, true);

        return redirect()->route($redirect);
    }
}
