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
    <title>SELLER DETAILS</title>
</head>

<body>
    <div class="container">
        <div class="content">
            <div class="cards">
                <div class="card">
                    <div class="box">
                        <h1>{{$sel}}</h1>
                        <h3>Total Seller</h3>
                    </div>
                </div>
            </div>
            <div class="content-2">
                <div class="recent-payments">
                    <div class="title">
                        <h2>SELLER DETAILS</h2>
                        <!-- <input type="search" placeholder="Search Here..."> -->
                        <a href="{{route('admin.files.createSeller')}}" class="btn">Add A SELLER</a>
                    </div>
                    <table>
                        <tr>
                            <th>Seller Id</th>
                            <th>Seller Name</th>
                            <th>Phone Number</th>
                            <th>Email</th>
                            <th>Address</th>
                            <th>Options</th>
                        </tr>
                        @foreach($sellall as $s)
                        <tr>
                            <td>{{$s['s_id']}}</td>
                            <td>{{$s['s_name']}}</td>
                            <td>{{$s['s_phn']}}</td>
                            <td>{{$s['s_mail']}}</td>
                            <td>{{$s['s_add']}}</td>
                            <td><a href="/admin/files/showSeller/{{$s['s_id']}}" class="btn">Edit</a></td>
                            <td><a href="/admin/files/deleteSeller/{{$s['s_id']}}" class="btn">Delete</a></td>
                        </tr>
                        @endforeach
                        
                    </table>
                    <div class="pagination">
                        {{$sellall->links()}}
                    </div>
                </div>
                
            </div>
        </div>
    </div>
</body>

</html>
@endsection
