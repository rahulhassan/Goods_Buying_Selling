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
    <title>BUYER DETAILS</title>
</head>

<body>
    <div class="container">
        <div class="content">
            <div class="cards">
                <div class="card">
                    <div class="box">
                        <h1>{{$buy}}</h1>
                        <h3>Total Buyer</h3>
                    </div>
                    <div class="icon-case">
                        <img src="students.png" alt="">
                    </div>
                </div>
            </div>
            <div class="content-2">
                <div class="recent-payments">
                    <div class="title">
                        <h2>BUYER DETAILS</h2>
                        <!-- <input type="search" placeholder="Search Here..."> -->
                        <a href="{{route('admin.files.createBuyer')}}" class="btn">Add A BUYER</a>
                    </div>
                    <table>
                        <tr>
                            <th>BUYER Id</th>
                            <th>BUYER Name</th>
                            <th>Phone Number</th>
                            <th>Email</th>
                            <th>Address</th>
                            <th>Options</th>
                        </tr>
                        @foreach($buyall as $b)
                        <tr>
                            <td>{{$b['b_id']}}</td>
                            <td>{{$b['b_name']}}</td>
                            <td>{{$b['b_phn']}}</td>
                            <td>{{$b['b_mail']}}</td>
                            <td>{{$b['b_add']}}</td>
                            <td><a href="/admin/files/showBuyer/{{$b['b_id']}}" class="btn">Edit</a></td>
                            <td><a href="/admin/files/deleteBuyer/{{$b['b_id']}}" class="btn">Delete</a></td>
                        </tr>
                        @endforeach
                        
                    </table>
                    <div class="pagination">
                        {{$buyall->links()}}
                    </div>
                </div>
                
            </div>
        </div>
    </div>
</body>

</html>
@endsection
