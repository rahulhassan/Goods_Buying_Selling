@extends('seller.layouts.navbar')
@section('content')

<hr>
<h4 style="text-align:center;font-family: myFirstFont;">Profile</h4>
<hr>
<div>
    <div class="container" style="padding: 30px 0">
        <div class="row">
       
                <div class="col-sm-4 ">
                    @if($seller->s_image==NULL)
                    
                        <img src="{{asset('dummy/download.png')}}" width="300px" alt="">
                    
                    @else
                    
                        <img src="{{asset('images/seller/'.$seller->s_image)}}" width="300px" height="300px" alt="Photo">
                    
                    @endif
                    
                </div>
                <div class="col-sm-8">
                    <table  class="table table-striped table-light table-responsive-sm" style="width:500px; height:300px">
                        <tr>
                            <td><b>Name</b></td>
                            <td><b>:</b></td>
                            <td><b>{{$seller->s_name}}</b></td>
                        </tr>
                        <tr>
                            <td><b>Email</b></td>
                            <td><b>:</b></td>
                            <td><b>{{$seller->s_mail}}</b></td>
                        </tr>
                        <tr>
                            <td><b>Phone</b></td>
                            <td><b>:</b></td>
                            <td><b>{{$seller->s_phn}}</b></td>
                        </tr>
                        <tr>
                            <td><b>Address</b></td>
                            <td><b>:</b></td>
                            <td><b>{{$seller->s_add}}</b></td>
                        </tr>
                    </table>
                    <a href="{{route('seller.update')}}"><button type="button" class="btn btn-success">Update Profile</button></a>

                </div>
     
              

        
        </div>
    </div>
</div>

@endsection