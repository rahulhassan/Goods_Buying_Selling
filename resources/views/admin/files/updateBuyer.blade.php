@extends('admin.layouts.main')
@section('content')
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{asset('css/adminDashboard.css')}}">
    <title>UPDATE BUYER</title>
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
                <h1>UPDATE BUYER</h1>
                     
                <form action="{{route('submit.updateBuyer')}}" method="POST">
                   {{@csrf_field()}}
                  <label>BUYER ID</label></br>
                  <input type="text" name="b_id" id="id" value="{{$data->b_id}}"></br>
                  <label>BUYER NAME</label></br>
                  <input type="text" name="b_name" id="name" value="{{$data->b_name}}"></br>
                  @error('b_name')
                        <span class="error">{{$message}}</span><br>
                  @enderror
                  <label>PHONE NUMBER</label></br>
                  <input type="text" name="b_phn" id="phn" value="{{$data->b_phn}}"></br>
                  @error('b_phn')
                        <span class="error">{{$message}}</span><br>
                  @enderror
                  <label>EMAIL</label></br>
                  <input type="text" name="b_mail" id="email" value="{{$data->b_mail}}"></br>
                  @error('b_mail')
                        <span class="error">{{$message}}</span><br>
                  @enderror
                  <label>PASSWORD</label></br>
                  <input type="text" name="b_pass" id="pass" value="{{$data->b_pass}}"></br>
                  @error('b_pass')
                        <span class="error">{{$message}}</span><br>
                  @enderror
                  <label>ADDRESS</label></br>
                  <input type="text" name="b_add" id="add" value="{{$data->b_add}}"></br>
                  @error('b_add')
                        <span class="error">{{$message}}</span><br>
                  @enderror
                  <button>UPDATE</button>
                </form>
        
                    
            </div>
        </div>
</div>
</body>
</html>
@endsection