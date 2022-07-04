@extends('employee.layout.navbar1')
@section('content')
<html>

<head>

<h5>Employee </h5>
<nav class="navbar navbar-light" style="background-color: #e3f2fd;">
  <div class="collapse navbar-collapse" id="navbarNav">
    <ul class="navbar-nav">
      <li class="nav-item active">
        <a class="nav-link" href="{{url('employee/empprofile')}}">Profile</a>
      </li> <br>
      <li class="nav-item">
        <a class="nav-link" href="{{url('employee/buyerlist')}}">Buyerlist</a>
      </li> <br>
      <li class="nav-item">
        <a class="nav-link" href="{{url('employee/sellerlist')}}">Sellerlist</a>
      </li> <br>
    </ul>
  </div>
</nav>
</head>

</html>
@endsection