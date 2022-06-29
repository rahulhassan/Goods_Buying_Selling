<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

</head>
<body>

<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <a class="navbar-brand">GBS</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo02" aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarTogglerDemo02">
    <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
      
      <li class="nav-item">
        <a class="nav-link" href="{{route('buyer.other.dashboard')}}">Dashboard</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="{{route('buyer.other.profile')}}">Profile</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="{{route('buyer.other.account')}}">Account</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="{{route('buyer.other.orders')}}">Orders</a>
      </li>
      <li class="nav-item">
      
        <a class="nav-link" href="{{route('buyer.other.logout')}}">Logout</a>
      </li>
      
    </ul>

      <input class="form-control" style="margin-left:100px;margin-right:10px" type="search" placeholder="Search">
      <button class="btn btn-outline-success" type="submit">Search</button>
   
  </div>
</nav>
    
@yield('contents')
</body>
</html>