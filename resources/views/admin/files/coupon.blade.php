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
    <title>COUPON DETAILS</title>
</head>

<body>
    <div class="container">
        <div class="content">
            <div class="cards">
                <div class="card">
                    <div class="box">
                        <h1>{{$cup}}</h1>
                        <h3>Total Coupon</h3>
                    </div>
                </div>
            </div>
            <div class="content-2">
                <div class="recent-payments">
                    <div class="title">
                        <h2>COUPON DETAILS</h2>
                        <a href="{{route('admin.files.addCoupon')}}" class="btn">Add A Coupon</a>
                    </div>
                    <table>
                        <tr>
                            <th>COUPON ID</th>
                            <th>COUPON NAME</th>
                            <th>DISCOUNT</th>
                            <th>Options</th>
                        </tr>
                        @foreach($cupall as $c)
                        <tr>
                            <td>{{$c['cpn_id']}}</td>
                            <td>{{$c['cpn_name']}}</td>
                            <td>{{$c['discount']}}</td>
                            <td><a href="/admin/files/deleteCoupon/{{$c['cpn_id']}}" class="btn">Delete</a></td>
                        </tr>
                        @endforeach
                        
                    </table>
                    <div class="pagination">
                        {{$cupall->links()}}
                    </div>
                </div>
                
            </div>
        </div>
    </div>
</body>

</html>
@endsection
