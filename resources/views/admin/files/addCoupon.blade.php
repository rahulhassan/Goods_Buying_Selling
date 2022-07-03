@extends('admin.layouts.main')
@section('content')
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{asset('css/adminDashboard.css')}}">
    <title>CREATE A COUPON</title>
</head>

<body>
<div class="container">
        <div class="content">
            <div class="content-3">
                <h1>CREATE A NEW COUPON</h1>
                     
                <form action="{{route('submit.storeCoupon')}}" method="POST">
                  {{@csrf_field()}}
                  <label>COUPON NAME</label></br>
                  <input type="text" name="cpn_name" id="name"></br>
                  <label>DISCOUNT</label></br>
                  <input type="text" name="discount" id="discount"></br>

                  <button>SAVE</button>
                </form>
        
                    
            </div>
        </div>
</div>
</body>
</html>
@endsection