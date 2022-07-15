@extends('layouts.homeNavbar')
@section('content')
<div class="w-25 p-3 justify-content-center">

@if(session('alert_success'))
        <div class="alert alert-warning" role="alert">
            <b>{{session('alert_success')}}</b>
            
        </div>
@endif

@if(session('alert_danger'))
        <div class="alert alert-warning" role="alert">
            <b>{{session('alert_danger')}}</b>
            
        </div>
@endif


<form action="{{route('submit.registration')}}" method="POST">
    {{ csrf_field() }}
    <h3>Registration</h3>
    <hr>
    <br>
    @if (Session::has('success'))
        <div class="alert alert-success">{{Session::get('success')}}</div>
    @endif
    @if (Session::has('fail'))
        <div class="alert alert-danger">{{Session::get('fail')}}</div>
    @endif
    <label>Name</label>
    <input type="text" name="name" value="{{old('name')}}" class="form-control" placeholder="Enter Your Name">
    @error('name')
    <span class="text-danger">{{$message}}</span>
    @enderror
    <br><br>
    <label>Email</label>
    <input type="text" name="email" value="{{old('email')}}" class="form-control" placeholder="Enter Your Email">
    @error('email')
    <span class="text-danger">{{$message}}</span>
    @enderror
    <br><br>
    <label for="exampleFormControlSelect1">Account Type</label>
    <select class="form-control" name="type">
      <option>Buyer</option>
      <option>Seller</option>
    </select>
    @error('type')
    <span class="text-danger">{{$message}}</span>
    @enderror
    <br><br>
    <label>Phone</label>
    <input type="text" name="phone" value="{{old('phone')}}" class="form-control" placeholder="Enter your phone number">
    @error('phone')
    <span class="text-danger">{{$message}}</span>
    @enderror
    <br><br>

    <label>Address</label>
    <input type="text" name="address" value="{{old('address')}}" class="form-control" placeholder="Enter your present address">
    @error('address')
    <span class="text-danger">{{$message}}</span>
    @enderror
    <br><br>

    <label>Password</label>
    <input type="password" name="psw" value="{{old('psw')}}" class="form-control" placeholder="Enter Password">
    @error('psw')
    <span class="text-danger">{{$message}}</span>
    @enderror
    <br><br>
    <label>Repeat Password</label>
    <input type="password" name="psw_repeat" value="{{old('psw_repeat')}}" class="form-control" placeholder="Re-entry Password">
    @error('psw_repeat')
    <span class="text-danger">{{$message}}</span>
    @enderror
    <br><br>
    
    <button type="submit" class="btn btn-primary">Sign Up</button>
    </div>
  </form>
</div>
@endsection