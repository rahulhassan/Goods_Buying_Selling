@extends('buyer/main/navbar1')
@section('contents')
<hr>
<h4 style="text-align:center;font-family: myFirstFont;">Order Overview</h4>
<hr>

@if(session('orderPlaced'))
        <div class="alert alert-success" role="alert">
            <b style="margin-left:480px;font-size:20px">{{session('orderPlaced')}}</b><br><br>
           
        </div>
@endif
<img src="dummy/order_completed.png" alt="" height="300px" width="500px" style="margin-left:400px">

@endsection