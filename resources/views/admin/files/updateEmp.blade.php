@extends('admin.layouts.main')
@section('content')
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{asset('css/adminDashboard.css')}}">
    <title>UPDATE EMPLOYEE</title>
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
                <h1>UPDATE EMPLOYEE</h1>
                     
                <form action="{{route('submit.updateEmp')}}" method="POST">
                   {{@csrf_field()}}
                  <label>EMPLOYEE ID</label></br>
                  <input type="text" name="e_id" id="id" value="{{$data->e_id}}"></br>
                  <label>EMPLOYEE NAME</label></br>
                  <input type="text" name="e_name" id="name" value="{{$data->e_name}}"></br>
                  @error('e_name')
                        <span class="error">{{$message}}</span><br>
                  @enderror
                  <label>PHONE NUMBER</label></br>
                  <input type="text" name="e_phn" id="phn" value="{{$data->e_phn}}"></br>
                  @error('e_phn')
                        <span class="error">{{$message}}</span><br>
                  @enderror
                  <label>EMAIL</label></br>
                  <input type="text" name="e_mail" id="email" value="{{$data->e_mail}}"></br>
                  @error('e_mail')
                        <span class="error">{{$message}}</span><br>
                  @enderror
                  <label>PASSWORD</label></br>
                  <input type="text" name="e_pass" id="pass" value="{{$data->e_pass}}"></br>
                  @error('e_pass')
                        <span class="error">{{$message}}</span><br>
                  @enderror
                  <label>ADDRESS</label></br>
                  <input type="text" name="e_add" id="add" value="{{$data->e_add}}"></br>
                  @error('e_add')
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