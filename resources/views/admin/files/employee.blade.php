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
    <title>EMPLOYEE DETAILS</title>
</head>

<body>
    <div class="container">
        <div class="content">
            <div class="cards">
                <div class="card">
                    <div class="box">
                        <h1>{{$emp}}</h1>
                        <h3>Total Employee</h3>
                    </div>
                    <div class="icon-case">
                        <img src="students.png" alt="">
                    </div>
                </div>
            </div>
            <div class="content-2">
                <div class="recent-payments">
                    <div class="title">
                        <h2>EMPLOYEE DETAILS</h2>
                        <!-- <input type="search" placeholder="Search Here..."> -->
                        <a href="{{route('admin.files.createEmp')}}" class="btn">Add A Employee</a>
                    </div>
                    <table>
                        <tr>
                            <th>Employee Id</th>
                            <th>Employee Name</th>
                            <th>Phone Number</th>
                            <th>Email</th>
                            <th>Address</th>
                            <th>Options</th>
                        </tr>
                        @foreach($empall as $e)
                        <tr>
                            <td>{{$e['e_id']}}</td>
                            <td>{{$e['e_name']}}</td>
                            <td>{{$e['e_phn']}}</td>
                            <td>{{$e['e_mail']}}</td>
                            <td>{{$e['e_add']}}</td>
                            <td><a href="/admin/files/show/{{$e['e_id']}}" class="btn">Edit</a></td>
                            <td><a href="/admin/files/delete/{{$e['e_id']}}" class="btn">Delete</a></td>
                        </tr>
                        @endforeach
                        
                    </table>
                    <div class="pagination">
                        {{$empall->links()}}
                    </div>
                </div>
                
            </div>
        </div>
    </div>
</body>

</html>
@endsection
