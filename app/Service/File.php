<?php

namespace App\Service;

use App\Models\User;
use Illuminate\Http\Request;

class File
{
    protected $request;
    protected $user;

    public function __construct()
    {}

    public function user(Request $request)
    {
        $this->request = $request;
        $this->user = $request->user();
    }

    public function create(array $data)
    {
        
    }
}