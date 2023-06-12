@extends('app')
@section('content')
    <form method="POST" action=" {{route('register')}} ">
        @csrf
        <div class="container">
            <div>
                <label for="Username">Username</label>
                <input type="text" name="username" id="username" v-model="form.username">

                @error('username')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
            <div>
                <label for="contact">Contact</label>
                <input type="number" name="contact" id="contact" v-model="form.contact">
                @error('contact')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror   
            </div>
            <div>
                <label for="age">Age</label>
                <input type="number" name="age" id="age" v-model="form.age">
                @error('age')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
            <div>
                <label for="password">Password</label>
                <input type="password" name="password" id="password" v-model="form.password">
                @error('password')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
            <div>
                <label for="password_confirmation">Retype Passowrd</label>
                <input type="password" name="password_confirmation" id="password_confirmation" v-model="form.password_confirmation">
            </div>
            <div>
                <button type="submit">Register</button>
                <button type="button">Cancel</button>
            </div>
        </div>
    </form>
    
@endsection