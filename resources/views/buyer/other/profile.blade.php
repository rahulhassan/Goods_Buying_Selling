
@extends('buyer/main/navbar1')
@section('contents')
<hr>
<h4 style="text-align:center;font-family: myFirstFont;">Profile</h4>
<hr>
<div>
    <div class="container" style="padding: 30px 0">
        <div class="row">
       
                <div class="col-sm-4 ">
                    @if($buyer->b_image==null)
                    
                        <img src="dummy/download.png" width="300px" alt="">
                    
                    @else
                    
                        <img src="{{asset('buyerImages/'.$buyer->b_image)}}" width="300px" height="300px" alt="">
                    
                    @endif
                    
                </div>
                <div class="col-sm-8">
                    <table  class="table table-striped table-dark table-responsive-sm" style="width:500px; height:300px">
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
                    <a href="{{route('buyer.other.updateProfile')}}"><button type="button" class="btn btn-success">Update Profile</button></a>

                </div>
     
              

        
        </div>
    </div>
</div>

@endsection