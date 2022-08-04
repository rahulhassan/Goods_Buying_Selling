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
            <a class="nav-item nav-link" href="{{url('employee/empprofile')}}">Profile</a>
            <a class="nav-item nav-link" href="{{url('employee/buyerlist')}}">Buyer List</a>
            <a class="nav-item nav-link" href="{{url('employee/sellerlist')}}">Seller List</a>
            <a class="nav-item nav-link" href="{{route('user.logout')}}">Logout</a>
            
          </div>
        </div>
      </nav>
      @yield('content')
</body>
</html>
