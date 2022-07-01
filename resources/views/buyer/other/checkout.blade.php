
@extends('buyer/main/navbar1')
@section('contents')
<hr>
<h4 style="text-align:center;font-family: myFirstFont;">Order Overview</h4>
<hr>
<div class="container" style="padding: 30px 0">
<form action="{{route('buyer.other.placeOrder')}}" method="post">
       @csrf
        <div class="row">
      
                <div class="col-sm-5">
                    <h5>Product Review</h5>



                         <div class="cart_total"  >

                            <table class="table  table-striped table-dark" style="width:380px">
                                <tr>
                                    <td></td>
                                    <td>Your Order</td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <td>Products</td>
                                    <td></td>
                                    <td></td>
                                </tr>
                                @foreach($carts as $c)
                                <tr>
                                    <td> {{$c->product->p_title}}({{$c->p_quantity}})</td>
                                    <td></td>
                                    <td>{{$c->p_price * $c->p_quantity}}</td>
                                </tr>
                                @endforeach
                                <tr>
                                    <td></td>
                                    <td></td>
                                    <td>
                                    @if(Session::has('coupon'))
                                    </td>
                                </tr>
                                <tr>
                                    <td>Sub Total</td>
                                    <td>:</td>
                                    <td>
                                            {{$sub_total}}
                                    </td>
                                </tr>
                                <!-- <tr>

                                    <td> Coupon</td>
                                    <td>:</td>
                                    <td>
                                            
                                            {{session()->get('coupon')['cpn_name']}}
                                            <a href="{{url('coupon/destroy')}}"><button type="button" style="float:right" class="btn-close btn-close-white" aria-label="Close"></button></a>
                                    </td>
                                </tr> -->
                                <tr>
                                    <td>Discount</td>
                                    <td>:</td>
                                    <td>
                                                
                                                            {{session()->get('coupon')['discount']}}%
                                    
                                                ({{$discount=$sub_total * session()->get('coupon')['discount'] /100}})
                                                
                                    </td>
                                </tr>

                                <tr>
                                    <td>Total</td>
                                    <td>:</td>
                                    <td>
                                                {{$sub_total-$discount}}
                                                @else
                                                    
                                                {{$sub_total}}
                                                   
                                                @endif
                                    </td>
                                </tr>
                            </table>



                         

                        </div>








                    
                </div>
            
                        <div class="col-sm-4">
                        <h5>Shipping Information</h5>
                        <table  class="table table-striped table-active table-responsive-sm" style="width:300px; height:320px">
                        <tr>
                            <td><b>Name</b></td>
                            <td><b>:</b></td>
                            <td><b><input type="text" class="form-control" name="name" value="{{old('name')}}"></b>
                            @error('name')
                                    <span class="text-danger">{{$message}}</span>
                             @enderror
                             </td>
                        </tr>



                        <tr>
                            <td><b>Phone</b></td>
                            <td><b>:</b></td>
                            <td><b><input type="text" class="form-control " name="phone" value="{{old('phone')}}"></b>
                            @error('phone')
                                    <span class="text-danger">{{$message}}</span>
                             @enderror
                             </td>
                        </tr>



                        <tr>
                            <td><b>Address</b></td>
                            <td><b>:</b></td>
                            <td><b><input type="text" class="form-control" name="address" value="{{old('address')}}"></b>

                            @error('address')
                                    <span class="text-danger">{{$message}}</span>
                             @enderror
                             </td>
                        </tr>



                    </table>
                                
                        </div>
                        <div class="col-sm-3">
                        <h5>Payment Methods</h5>


                        <div class="payment-method">
                                <table  class="table table-striped table-active table-responsive-sm" style="width:280px; height:200px">
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
                                        @error('payment')
                                                <span class="text-danger">{{$message}}</span>
                                         @enderror

                                         <br><br>
                        </div>


                        </div>
                                                                
            
        <button type="Submit" class="btn btn-success" style="width:100%">PLACE ORDER</button>
</form>
</div>

@endsection