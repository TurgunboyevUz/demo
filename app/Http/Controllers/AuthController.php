<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function index()
    {
        return view('auth.login');
    }

    public function url($type)
    {
        $url = oauth()->url($type);

        return redirect($url);
    }

    public function student_url()
    {
        return $this->url('student');
    }

    public function employee_url()
    {
        return $this->url('employee');
    }

    public function callback(Request $request, $type)
    {
        $auth = oauth()->auth($request, $type);

        if (!$auth) {
            return redirect()->route($type . '.login');
        }

        
    }
}