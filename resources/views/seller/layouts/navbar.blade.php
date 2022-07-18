<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="ps-3 navbar-brand" href="{{route('home')}}">GBS</a>
        <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
          <div class="navbar-nav">
            <a class="nav-item nav-link" href="{{route('seller.dashboard')}}">Dashboard</a>
            <a class="nav-item nav-link" href="{{route('seller.profile')}}">Profile</a>
            <a class="nav-item nav-link" href="{{route('seller.post')}}">Post Product</a>
            <a class="nav-item nav-link" href="{{route('seller.orders')}}">Orders</a>
            <a class="nav-item nav-link" href="{{route('seller.statement')}}">Statement</a>
            <a style="margin-left:600px"href="{{route('user.logout')}}"><button type="button" class="btn btn-outline-primary">Sign Out</button></a>
          </div>
          <h5 class="nav-item" style="margin-left:20px">Welcome, {{Session::get('loginName')}}</h5>
          <a href="{{route('seller.profile')}}"><img src="{{asset('images/seller/'.Session::get('profilePhoto'))}}" alt="Avatar" style="margin-left:20px; vertical-align: middle;width: 45px;height: 45px;border-radius: 50%;"></a> 
        </div>
      </nav>
      @yield('content')
</body>
</html>
