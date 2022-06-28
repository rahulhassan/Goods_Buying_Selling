@extends('layouts.homeNavbar')
@section('content')
    <div class="col d-flex justify-content-center">
        <form action="{{route('submit.login')}}" method="POST">
            {{ csrf_field() }}
            <h3>Login</h3>
            <br>
            @if (Session::has('fail'))
                <div class="alert alert-danger">{{Session::get('fail')}}</div>
            @endif

            <!-- Email input -->
            <div class="form-outline mb-4">
            @error('email')
                <span class="text-danger">{{$message}}</span>
            @enderror
            <input type="email" name="email" value="{{old('email')}}" class="form-control"/>
            <label class="form-label">Email address</label>
            </div>
        
            <!-- Password input -->
            <div class="form-outline mb-4">
            @error('pass')
                <span class="text-danger">{{$message}}</span>
            @enderror
            <input type="password" name="pass" value="{{old('pass')}}" class="form-control"/>
            <label class="form-label">Password</label>
            </div>

            <!-- Submit button -->
            <button type="submit" class="btn btn-primary btn-block mb-4">Sign in</button>
        
            <!-- Register buttons -->
            <div class="text-center">
            <p>Not a member? <a href="{{route('user.registration')}}">Register</a></p>
            </div>
        </form>
    </div>
@endsection