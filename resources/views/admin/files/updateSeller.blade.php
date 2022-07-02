@extends('admin.layouts.main')
@section('content')
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{asset('css/adminDashboard.css')}}">
    <title>UPDATE SELLER</title>
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
                <h1>UPDATE SELLER</h1>
                     
                <form action="{{route('submit.updateSeller')}}" method="POST">
                   {{@csrf_field()}}
                  <label>SELLER ID</label></br>
                  <input type="text" name="s_id" id="id" value="{{$data->s_id}}"></br>
                  <label>SELLER NAME</label></br>
                  <input type="text" name="s_name" id="name" value="{{$data->s_name}}"></br>
                  @error('s_name')
                        <span class="error">{{$message}}</span><br>
                  @enderror
                  <label>PHONE NUMBER</label></br>
                  <input type="text" name="s_phn" id="phn" value="{{$data->s_phn}}"></br>
                  @error('s_phn')
                        <span class="error">{{$message}}</span><br>
                  @enderror
                  <label>EMAIL</label></br>
                  <input type="text" name="s_mail" id="email" value="{{$data->s_mail}}"></br>
                  @error('s_mail')
                        <span class="error">{{$message}}</span><br>
                  @enderror
                  <label>PASSWORD</label></br>
                  <input type="text" name="s_pass" id="pass" value="{{$data->s_pass}}"></br>
                  @error('s_pass')
                        <span class="error">{{$message}}</span><br>
                  @enderror
                  <label>ADDRESS</label></br>
                  <input type="text" name="s_add" id="add" value="{{$data->s_add}}"></br>
                  @error('s_add')
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