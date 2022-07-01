@extends('buyer/main/navbar1')
@section('contents')
<hr>
<h4 style="text-align:center;font-family: myFirstFont;">Order Overview</h4>
<hr>

@if(session('orderPlaced'))
        <div class="alert alert-warning" role="alert">
            <b>{{session('orderPlaced')}}</b>
            
        </div>
@endif

@endsection