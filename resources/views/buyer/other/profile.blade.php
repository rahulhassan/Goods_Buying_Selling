
@extends('buyer/main/navbar')
@section('contents')
<hr>
<h3 style="text-align:center">Profile</h3>
<hr>
<div>
    <div class="container" style="padding: 30px 0">
        <div class="row">
       
                <div class="col-sm-4 ">
                    <img src="{{asset('buyerImages/'.$buyer->b_image)}}" width="300px" alt="">
                </div>
                <div class="col-sm-8">
                    <table  class="table table-striped table-active table-responsive-sm" style="width:500px; height:300px">
                        <tr>
                            <td><b>Name</b></td>
                            <td><b>:</b></td>
                            <td><b>{{$buyer->b_name}}</b></td>
                        </tr>
                        <tr>
                            <td><b>Email</b></td>
                            <td><b>:</b></td>
                            <td><b>{{$buyer->b_mail}}</b></td>
                        </tr>
                        <tr>
                            <td><b>Phone</b></td>
                            <td><b>:</b></td>
                            <td><b>{{$buyer->b_phn}}</b></td>
                        </tr>
                        <tr>
                            <td><b>Address</b></td>
                            <td><b>:</b></td>
                            <td><b>{{$buyer->b_add}}</b></td>
                        </tr>
                    </table>
                    <a href="{{route('buyer.other.updateProfile')}}"><button type="button" class="btn btn-success">Update</button></a>

                </div>
     
              

        
        </div>
    </div>
</div>

@endsection