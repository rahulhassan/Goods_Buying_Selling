@extends('layouts.homeNavbar')
@section('content')
<div class="col d-flex justify-content-center">
    <h3>Verification Email has been sent !!!</h3><br><br>
    <form action="{{route('verification.send')}}" method="post">
        @csrf 
        <button type="Submit" class="btn btn-info">Resend Email</button>
    </form>
</div>
@endsection