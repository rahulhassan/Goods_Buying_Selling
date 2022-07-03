@extends('admin.layouts.main')
@section('content')
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{asset('css/adminDashboard.css')}}">
    <title>Admin Dashboard</title>
</head>

<body>
    <div class="container">
        <div class="content">
            <div class="cards">
                <div class="card">
                    <div class="box">
                        <h1>{{$emp}}</h1>
                        <h3>EMPLOYEE</h3>
                    </div>
                    <div class="icon-case">
                        <img src="students.png" alt="">
                    </div>
                </div>
                <div class="card">
                    <div class="box">
                        <h1>{{$buy}}</h1>
                        <h3>BUYER</h3>
                    </div>
                    <div class="icon-case">
                        <img src="teachers.png" alt="">
                    </div>
                </div>
                <div class="card">
                    <div class="box">
                        <h1>{{$sell}}</h1>
                        <h3>SELLER</h3>
                    </div>
                    <div class="icon-case">
                        <img src="schools.png" alt="">
                    </div>
                </div>
                <div class="card">
                    <div class="box">
                        <h1>{{$ord}}</h1>
                        <h3>ORDER</h3>
                    </div>
                    <div class="icon-case">
                        <img src="income.png" alt="">
                    </div>
                </div>
                <div class="card">
                    <div class="box">
                        <h1>2000</h1>
                        <h3>INCOME</h3>
                    </div>
                    <div class="icon-case">
                        <img src="income.png" alt="">
                    </div>
                </div>
            </div>
            <div class="content-2">
                <div class="recent-payments">
                    <div class="title">
                        <h2>Recent Payments</h2>
                        <a href="#" class="btn">View All</a>
                    </div>
                    <table>
                        <tr>
                            <th>Payment Id</th>
                            <th>Order Id</th>
                            <th>Quantity</th>
                            <th>Price</th>
                        </tr>
                        <tr>
                            <td>John Doe</td>
                            <td>5</td>
                            <td>1</td>
                            <td>$120</td>
                        </tr>
                    </table>
                </div>
                <div class="new-students">
                    <div class="title">
                        <h2>Employees</h2>
                        <a href="{{route('admin.files.employee')}}" class="btn">View All</a>
                    </div>
                    <table>
                        <tr>
                            <th>Employee Id</th>
                            <th>Employee Name</th>
                        </tr>
                        
                        @foreach($emplall as $e)
                        <tr>
                            <td>{{$e['e_id']}}</td>
                            <td>{{$e['e_name']}}</td>
                        </tr>
                        @endforeach

                    </table>
                </div>
            </div>
        </div>
    </div>
</body>

</html>
@endsection
