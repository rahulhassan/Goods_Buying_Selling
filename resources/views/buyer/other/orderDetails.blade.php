
@extends('buyer/main/navbar')
@section('contents')

<hr>
<h3 style="text-align:center"> Order Overview</h3>
<hr>
<div class="container" style="padding: 30px 0">
<form action="{{route('buyer.other.placeOrderSubmit',['title'=>$products->p_title])}}" method="post">
        @csrf
        <div class="row">
      
                <div class="col-sm-4 ">
                    <h5>Order Review</h5>
                    <img src="{{asset('images/'.$products->image_path)}}" height="180px" width="200px"><br><br>
                    <b>Title: {{$products->p_title}}</b><br>
                    <b>Price: {{$products->p_price}}</b><br>
                    <b>Quantity: {{$products->p_quantity}}</b><br>
                </div>
            
                        <div class="col-sm-4">
                        <h5>Shipping Information</h5>
                        <table  class="table table-striped table-active table-responsive-sm" style="width:300px; height:320px">
                        <tr>
                            <td><b>Name</b></td>
                            <td><b>:</b></td>
                            <td><b><input type="text" class="form-control" name="name" value="{{old('name')}}"></b></td>
                            @error('name')
                                    <span class="text-danger">{{$message}}</span><br><br>
                             @enderror
                        </tr>



                        <tr>
                            <td><b>Phone</b></td>
                            <td><b>:</b></td>
                            <td><b><input type="text" class="form-control " name="phone" value="{{old('phone')}}"></b></td>
                            @error('phone')
                                    <span class="text-danger">{{$message}}</span><br><br>
                             @enderror
                        </tr>



                        <tr>
                            <td><b>Address</b></td>
                            <td><b>:</b></td>
                            <td><b><input type="text" class="form-control" name="address" value="{{old('address')}}"></b></td>

                            @error('address')
                                    <span class="text-danger">{{$message}}</span><br><br>
                             @enderror
                        </tr>



                    </table>
                                
                        </div>
                        <div class="col-sm-4">
                        <h5>Payment Methods</h5>


                        <div class="payment-method">
                                <table  class="table table-striped table-active table-responsive-sm" style="width:300px; height:200px">
                                        <tr>
                                                <td>
                                                        <div class="input-radio">
                                                                <input type="radio" name="payment" id="payment-1" value="Cash">
                                                                
                                                                <label for="payment-1">
                                                                        <span></span>
                                                                        Cash on Delivery
                                                                </label>
                                                                <div class="caption">
                                                                        <p>You can select cash on delivery.</p>
                                                                </div>
                                                        </div>
                                                </td>

                                        </tr>
                                        <tr>
                                                <td>
                                                        <div class="input-radio">
                                                                <input type="radio" name="payment" id="payment-2" value="Bkash">
                                                        
                                                                <label for="payment-2">
                                                                        Bkash
                                                                </label>
                                                                <div class="caption">
                                                                <p> Bkash No: 01723654987</p>
                                                                        
                                                                </div>
                                                        </div>
                                                </td>

                                        </tr>
                                        <tr>
                                                <td>
                                                        <div class="input-radio">
                                                                        <input type="radio" name="payment" id="payment-3" value="Nogod">
                                                                
                                                                <label for="payment-3">
                                                                        Nogod
                                                                </label>
                                                                <div class="caption">
                                                                <p> Nogod No: 01723654987</p>
                                                                        
                                                                </div>
                                                        </div>
                                                </td>

                                        </tr>
                                        <tr>
                                                <td>
                                                        <div class="input-radio">
                                                                        <input type="radio" name="payment" id="payment-4" value="Rocket">
                                                        
                                                                <label for="payment-4">
                                                                        Rocket
                                                                </label>
                                                                <div class="caption">
                                                                <p>  Rocket No: 01723654987</p>
                                                                
                                                                </div>
                                                        </div>
                                                </td>
                                        </tr>
                                </table>
                        </div>

        </div>
        <button type="Submit" class="btn btn-danger">Place Order</button>
</form>
</div>

@endsection