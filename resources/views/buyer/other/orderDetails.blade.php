
@extends('buyer/main/navbar')
@section('contents')

<hr>
<h3 style="text-align:center"> Order Overview</h3>
<hr>
<div class="container" style="padding: 30px 0">
        <div class="row">
       
                <div class="col-sm-4 ">
                    <h5>Order Review</h5>
                    <img src="{{asset('images/'.$products->image_path)}}" height="180px" width="200px">
                </div>

                <div class="col-sm-4">
                <h5>Shipping Information</h5>

                            
                </div>
                <div class="col-sm-4">
                <h5>Payment Methods</h5>

                            
                </div>
        </div>
</div>

@endsection