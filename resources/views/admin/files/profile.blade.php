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

<body>
    <div class="p-img">
        <div class="img-sec">
            <img src="{{asset('images/PPIC.png')}}">
        </div>
        <form action="" method="POST">
            <div class="icon">
                <input type="file" placeholder="{{asset('images/ADD.png')}}">
                <a href="#"><img src="{{asset('images/ADD.png')}}"></a>
                </div>
        </form>
    </div>
    <div class="p-sec">
        <h2>PASSWORD CHANGE</h2>
        <form action="">
            <label>OLD PASSWORD</label></br>
            <input type="text" name="o_pass" id="opass"></br>
            <label>NEW PASSWORD</label></br>
            <input type="text" name="n_pass" id="npass"></br>
            <label>RE-TYPE PASSWORD</label></br>
            <input type="text" name="r_pass" id="rpass"></br>
            <button>Submit</button>
        </form>
    </div>


</body>

</html>
@endsection