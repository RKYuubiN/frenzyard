<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

class UserController extends Controller
{
    protected $request;
    protected $category;

    public function __construct(
        Request $request,
        CategoryController $category
        )
    {
        $this->request = $request;
        $this->category = $category;
    }

    public function show()
    {
        if(Route::getCurrentRoute()->uri == 'dashboard'){
            return view('user.dashboard',[
                'username'=>auth()->user()->username,
                'category'=>$this->category->get(),
            ]);
        }
        return view('app');
    }
}
