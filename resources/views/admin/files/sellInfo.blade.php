@extends('admin.layouts.main')
@section('content')
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{asset('css/adminDashboard.css')}}">
    <title>SELL INFORMATION</title>
</head>

<body>
    <div class="container">
        <div class="content">
            <div class="cards">
                <div class="card">
                    <div class="box">
                        <h1>30</h1>
                        <h3>TOTAL SELL</h3>
                    </div>
                    <div class="icon-case">
                        <img src="teachers.png" alt="">
                    </div>
                </div>
                <div class="card">
                    <div class="box">
                        <h1>120</h1>
                        <h3>TODAY'S SELL</h3>
                    </div>
                    <div class="icon-case">
                        <img src="schools.png" alt="">
                    </div>
                </div>
                <div class="card">
                    <div class="box">
                        <h1>50</h1>
                        <h3>MONTHLY SELL</h3>
                    </div>
                    <div class="icon-case">
                        <img src="income.png" alt="">
                    </div>
                </div>
                <div class="card">
                    <div class="box">
                        <h1>2000</h1>
                        <h3>PENDING ORDERS</h3>
                    </div>
                    <div class="icon-case">
                        <img src="income.png" alt="">
                    </div>
                </div>
            </div>
            <div class="content-2">
                <div class="recent-payments">
                    <div class="title">
                        <h2>Payments</h2>
                    </div>
                    <table>
                        <tr>
                            <th>PAYMENT Id</th>
                            <th>ORDER Id</th>
                            <th>Quantity</th>
                            <th>Price</th>
                        </tr>
                        @foreach($orderItem as $o)
                        <tr>
                            <td>{{$o['order_id']}}</td>
                            <td>{{$o['p_id']}}</td>
                            <td>{{$o['p_quantity']}}</td>
                           
                        </tr>
                        @endforeach
                        @foreach($order as $o)
                        <tr>
                            <td>{{$o['total']}}</td>
                           
                        </tr>
                        @endforeach
                        
                    </table>
                    <div class="pagination">
                        {{$order->links()}}
                    </div>
                </div>
                
            </div>
        </div>
    </div>
</body>

</html>
@endsection
