@extends('admin.layouts.main')
@section('content')
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{asset('css/profile.css')}}">
    <title>PROFILE</title>
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
    .success{
        font-size: 20px;
        font-weight: 500;
        text-align:center;
        color: orange;
    }
</style>

<body>
    <div class="p-img">
        @if (session('successImg'))
          <div class="success">
             {{ session('successImg')}}
        </div>
        @endif
        <div class="img-sec">
            <img src="{{asset('storage/images/'. $data->a_image)}}">
        </div>
        <form action="{{route('admin.files.upload')}}" method="POST" enctype="multipart/form-data">
            {{@csrf_field()}}
            <div class="icon">
                <input type="file" name="pf">
                <button>Upload</button>
                </div>
        </form>
    </div>
    <div class="p-sec">
        <h2>PASSWORD CHANGE</h2>
        @if (session('success'))
        <div class="success">
            {{ session('success')}}
        </div>
        @endif
        <form action="{{route('admin.files.updatePass')}}" method="POST">
            {{@csrf_field()}}
            <label>OLD PASSWORD</label></br>
            <input type="text" name="o_pass" id="opass"></br>
            @error('o_pass')
                 <span class="error">{{$message}}</span><br>
            @enderror
            <label>NEW PASSWORD</label></br>
            <input type="password" name="a_pass" id="npass"></br>
            @error('a_pass')
                 <span class="error">{{$message}}</span><br>
            @enderror
            <label>RE-TYPE PASSWORD</label></br>
            <input type="password" name="r_pass" id="rpass"></br>
            @error('r_pass')
                 <span class="error">{{$message}}</span><br>
            @enderror
            <button>Submit</button>
        </form>
    </div>


</body>

</html>
@endsection