<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Users;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function __construct()
    {
        // $this->middleware('auth');
    }

    protected function create()
    {
        return view('user.register');
    }

    protected function register(Request $request)
    {
        $validated = $request->validate([
            'username'=>'required|string|unique:users|max:255',
            'contact'=>'required|numeric',
            'age'=>'required|numeric',
            'password'=>'required|string|min:8|confirmed'
        ]);

        $user = Users::create([
            'username'=>$validated['username'],
            'contact'=>$validated['contact'],
            'age'=>$validated['age'],
            'password'=>Hash::make($validated['password']),
        ]);
        $user->save();

        // Auth::login($user);

        return redirect()->route('
        dashboard');


    }
}
