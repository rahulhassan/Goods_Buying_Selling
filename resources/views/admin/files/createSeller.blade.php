@extends('admin.layouts.main')
@section('content')
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{asset('css/adminDashboard.css')}}">
    <title>CREATE SELLER</title>
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
                <h1>CREATE A NEW SELLER</h1>
                     
                <form action="{{route('submit.storeSeller')}}" method="POST">
                  {{@csrf_field()}}
                  <label>SELLER NAME</label></br>
                  <input type="text" name="s_name" id="name"></br>
                  @error('s_name')
                        <span class="error">{{$message}}</span><br>
                  @enderror
                  <label>PHONE NUMBER</label></br>
                  <input type="text" name="s_phn" id="phn"></br>
                  @error('s_phn')
                        <span class="error">{{$message}}</span><br>
                  @enderror
                  <label>EMAIL</label></br>
                  <input type="text" name="s_mail" id="email"></br>
                  @error('s_mail')
                        <span class="error">{{$message}}</span><br>
                  @enderror
                  <label>PASSWORD</label></br>
                  <input type="text" name="s_pass" id="pass"></br>
                  @error('s_pass')
                        <span class="error">{{$message}}</span><br>
                  @enderror
                  <label>ADDRESS</label></br>
                  <input type="text" name="s_add" id="add"></br>
                  @error('s_add')
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