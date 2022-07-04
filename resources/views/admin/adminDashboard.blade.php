@extends('admin.layouts.main')
@section('content')
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
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
                        <h2>ORDERS</h2>
                        <a href="{{route('admin.files.order')}}" class="btn">View All</a>
                    </div>
                    <table>
                        <tr>
                            <th>SELLER ID</th>
                            <th>PRODUCT ID</th>
                            <th>BUYER ID</th>
                            <th>PAYMENT TYPE</th>
                            <th>PAYMENT STATUS</th>
                            <th>QUANTITY</th>
                            <th>SUBTOTAL</th>
                            <th>DISCOUNT</th>
                            <th>TOTAL</th>
                        </tr>
                        @foreach($orderall as $o)
                        <tr>
                            <td>{{$o['buyer_id']}}</td>
                            <td>{{$o['product_id']}}</td>
                            <td>{{$o['seller_id']}}</td>
                            <td>{{$o['payment_type']}}</td>
                            <td>{{$o['payment_status']}}</td>
                            <td>{{$o['quantity']}}</td>
                            <td>{{$o['sub_total']}}</td>
                            <td>{{$o['discount']}}</td>
                            <td>{{$o['total']}}</td>
                        </tr>
                        @endforeach
                        
                    </table>
                    <div class="pagination">
                        {{$orderall->links()}}
                    </div>
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
