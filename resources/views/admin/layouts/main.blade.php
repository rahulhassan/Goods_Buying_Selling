<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{asset('css/adminDashboard.css')}}">
</head>

<body>
    <div class="side-menu">
        <div class="brand-name">
            <h1>GBS</h1>
        </div>
        <ul>
            <li><img src="" alt=""><span><a href="{{route('admin.adminDashboard')}}">DASHBOARD</a></span> </li>
            <li><img src="" alt=""><span><a href="{{route('admin.files.statement')}}">STATEMENT</a></span> </li>
            <li><img src="" alt=""><span><a href="{{route('admin.files.order')}}">ORDER</a></span> </li>
            <li><img src="" alt=""><span><a href="{{route('admin.files.coupon')}}">COUPON</a></span> </li>
            <li><img src="" alt=""><span><a href="{{route('admin.files.employee')}}">SEE EMPLOYEE</a></span> </li>
            <li><img src="" alt=""><span><a href="{{route('admin.files.buyer')}}">SEE BUYER</a></span> </li>
            <li><img src="" alt=""><span><a href="{{route('admin.files.seller')}}">SEE SELLER</a></span> </li>
            <li><img src="" alt=""><span><a href="{{route('admin.files.profile')}}">SETTINGS</a></span> </li>
        </ul>
    </div>
    <div class="container">
        <div class="header">
            <div class="nav">
                <div class="search">
                    <input type="text" placeholder="Search..">
                    <button type="submit"><img src="{{asset('images/search.png')}}" alt=""></button>
                </div>
                <div class="user">
                    <a href="{{route('admin.files.employee')}}" class="btn">Add A EMP</a>
                    <img src="{{asset('images/BELL.png')}}" alt="">
                    <div class="img-case">
                        <a href="{{route('admin.files.profile')}}"><img src="{{asset('storage/images/'. $data->a_image)}}" alt=""></a>
                    </div>
                    <a href="{{route('user.login')}}" class="btn">LOG OUT</a>

                </div>
            </div>
        </div>
        @yield('content')
</body>
</html>