@extends('admin.layouts.main')
@section('content')
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{asset('css/adminDashboard.css')}}">
    <title>CREATE BUYER</title>
</head>
<style>
    h1{
        font-size: 30px;
        text-align: center;
        margin-bottom:50px;
    }
    form{
        text-align: center;
    }
    .error{
        color:red;
    }
</style>

<body>
<div class="container">
        <div class="content">
            <div class="content-3">
                <h1>CREATE A NEW BUYER</h1>
                     
                <form action="{{route('submit.storeBuyer')}}" method="POST">
                  {{@csrf_field()}}
                  <label>BUYER NAME</label></br>
                  <input type="text" name="b_name" id="name"></br>
                  @error('b_name')
                        <span class="error">{{$message}}</span><br>
                  @enderror
                  <label>PHONE NUMBER</label></br>
                  <input type="text" name="b_phn" id="phn"></br>
                  @error('b_phn')
                        <span class="error">{{$message}}</span><br>
                  @enderror
                  <label>EMAIL</label></br>
                  <input type="text" name="b_mail" id="email"></br>
                  @error('b_mail')
                        <span class="error">{{$message}}</span><br>
                  @enderror
                  <label>PASSWORD</label></br>
                  <input type="password" name="b_pass" id="pass"></br>
                  @error('b_pass')
                        <span class="error">{{$message}}</span><br>
                  @enderror
                  <label>ADDRESS</label></br>
                  <input type="text" name="b_add" id="add"></br>
                  @error('b_add')
                        <span class="error">{{$message}}</span><br>
                  @enderror
                  <button>ADD</button>
                </form>
        
                    
            </div>
        </div>
</div>
</body>
</html>
@endsection