
@extends('buyer/main/navbar1')
@section('contents')



<hr>
<h4 style="text-align:center;font-family: myFirstFont;">Update Profile</h4>
<hr>


@if(session('profileUpdated'))
                <div class="alert alert-success" role="alert">
                    <b>{{session('profileUpdated')}}</b>
                    
                </div>
 @endif
 @if(session('profileNotUpdated'))
                <div class="alert alert-danger" role="alert">
                    <b>{{session('profileNotUpdated')}}</b>
                    
                </div>
 @endif



<div>
    <div class="container" style="padding: 30px 0">
    <form action="" method="post" enctype="multipart/form-data">
    {{@csrf_field()}}
        <div class="row">
       
                <div class="col-sm-4">
                    
                @if($buyer->b_image==null)
                    
                        <img src="dummy/download.png" width="300px" alt="">
                    
                    @else
                    
                        <img src="{{asset('buyerImages/'.$buyer->b_image)}}" width="300px" height="300px" alt="">
                    
                    @endif


                   <br><br>
                    <input type="file" name="pro_pic"><br><br>
                            @error('pro_pic')
                                    <span class="text-danger">{{$message}}</span><br><br>
                             @enderror
                    <!-- <button type="Submit" class="btn btn-primary">Change Photo</button> -->
                </div>
                <div class="col-sm-8">
                    <table  class="table table-striped table-dark table-responsive-sm" style="width:500px; height:300px">
                        <tr>
                            <td><b>Name</b></td>
                            <td><b>:</b></td>
                            <td><b><input type="text" class="form-control" name="name" value="{{$buyer->b_name}}"></b>
                            @error('name')
                                    <span class="text-danger">{{$message}}</span>
                             @enderror
                             </td>
                        </tr>



                        <tr>
                            <td><b>Email</b></td>
                            <td><b>:</b></td>
                            <td><b><input type="text" class="form-control " name="email" value="{{$buyer->b_mail}}" disabled></b>
                            @error('email')
                                    <span class="text-danger">{{$message}}</span>
                             @enderror
                             </td>
                        </tr>



                        <tr>
                            <td><b>Phone</b></td>
                            <td><b>:</b></td>
                            <td><b><input type="text" class="form-control" name="phone" value="{{$buyer->b_phn}}"></b>

                            @error('phone')
                                    <span class="text-danger">{{$message}}</span>
                             @enderror
                             </td>
                        </tr>



                        <tr>
                            <td><b>Address</b></td>
                            <td><b>:</b></td>
                            <td><b><input type="text" class="form-control" name="address" value="{{$buyer->b_add}}"></b>

                            @error('address')
                                    <span class="text-danger">{{$message}}</span>
                             @enderror
                             </td>
                        </tr>



                    </table>
                    <button type="Submit" class="btn btn-success">Update</button>
                </div>
     
                

        
        </div>
    </form>
    </div>
</div>

@endsection