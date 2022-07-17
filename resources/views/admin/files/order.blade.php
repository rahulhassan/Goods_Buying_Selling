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
    <title>SELL INFORMATION</title>
</head>

<body>
    <div class="container">
        <div class="content">
            <div class="cards">
                <div class="card">
                    <div class="box">
                        <h1>{{$ord}}</h1>
                        <h3>TOTAL ORDER</h3>
                    </div>
                </div>
                <div class="card">
                    <div class="box">
                        <h1>12000</h1>
                        <h3>TODAY'S SELL</h3>
                    </div>
                </div>
                <div class="card">
                    <div class="box">
                        <h1>500000</h1>
                        <h3>MONTHLY SELL</h3>
                    </div>
                </div>
                <div class="card">
                    <div class="box">
                        <h1>10</h1>
                        <h3>PENDING ORDERS</h3>
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
                            <th>SELLER ID</th>
                            <th>PRODUCT ID</th>
                            <th>BUYER ID</th>
                            <th>PAYMENT TYPE</th>
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
                
                
            </div>
        </div>
    </div>
</body>

</html>
@endsection
