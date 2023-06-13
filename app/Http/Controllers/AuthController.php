<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Route;
use Throwable;

class AuthController extends Controller
{
    public function __construct()
    {

    }

    protected function create()
    {
        if(Route::getCurrentRoute()->uri()=='register'){
            return view('user.register');
        }else{
            return view('user.login');
        }
    }

    protected function register(Request $request)
    {
        $validated = $request->validate([
            'username'=>'required|string|unique:users|max:255',
            'contact'=>'required|numeric',
            'age'=>'required|numeric',
            'password'=>'required|string|min:8|confirmed'
        ]);

        try{
            DB::beginTransaction();
            $user = User::create([
                'username'=>$validated['username'],
                'contact'=>$validated['contact'],
                'age'=>$validated['age'],
                'password'=>Hash::make($validated['password']),
            ]);
            $user->save();
            Auth::login($user);
            DB::commit();

        }catch(Throwable $th){
            DB::rollBack();
            return redirect('register')->withErrors('User Registration Failed. Please try again');
        }

        return redirect('dashboard');
    }

    protected function login(Request $request)
    {
        $validated = $request->validate([
            'username'=>'required|string|max:255',
            'password'=>'required|string|min:8'
        ]);

        if(auth()->attempt(['username'=>$validated['username'],'password'=>$validated['password']])){
            $request->session()->regenerate();
            return redirect('dashboard');
        }

        return redirect()->back()->withErrors('Invalid Credentials. Please try again');
    }

    protected function logout()
    {
        auth()->logout();
        request()->session()->invalidate();
        request()->session()->regenerateToken();
        return redirect('/');
    }
}
