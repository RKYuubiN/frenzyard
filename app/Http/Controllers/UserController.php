<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    protected $request;

    public function __construct(Request $request)
    {
        $this->request = $request;
    }

    public function show(){
        return view('register');
    }

    public function register()
    {
        dd($this->request);
    }
}
