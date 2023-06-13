@extends('app')
@section('content')
<div class="w-full max-w-xs m-auto mt-8">
    <form class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4" method="POST" action=" {{route('login')}} ">
        @csrf
        @if($errors->any())
            <div>
                @foreach($errors->all() as $error)
                    <span>{{ $error }}</span>
                @endforeach
            </div>
        @endif
            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="Username">Username</label>
                <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" type="text" name="username" id="username">

                @error('username')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-4">
                <label class = "block text-gray-700 text-sm font-bold mb-2" for="password">Password</label>
                <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" type="password" name="password" id="password">
                @error('password')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="flex items-center justify-between">
                <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline" type="submit">Login</button>
            </div>
        </form>
    </div>
    
@endsection