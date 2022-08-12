
@extends('buyer/main/navbar1')
@section('contents')
<script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<hr>
<h3 style="text-align:center;font-family: myFirstFont;">Shopping Cart </h3>
<hr> 




 @if(session('cartDeleted'))
        <div class="alert alert-danger" role="alert">
            <b>{{session('cartDeleted')}}</b>
            
        </div>
@endif

@if(session('cartQuantityUpdated'))
        <div class="alert alert-warning" role="alert">
            <b>{{session('cartQuantityUpdated')}}</b>
            
        </div>
@endif



<div class="container">
  <div class="row">
    <div class="col-sm-1 ">
     
        

    </div>
    <div class="col-sm-10">
 
            <table class="table  table-striped table-dark" >
                    <tr>
                        <th>Products</th>
                        <th>Price</th>      
                        <th>Quantity</th>
                        <th></th>
                        <th>Total</th>
                        <th> </th>
                    </tr>
                    @foreach($carts as $c)
                    <tr>
                       <td>
                            <img src="{{asset('images/'.$c->product->image_path)}}" height="80px" width="80px" alt="">
                            {{$c->product->p_title}}
                       </td>
                       
               
                       
                        <td >{{$c->p_price}}</td>
                        
              
                        <td>
                         
                                                            
                                    <div class="col-md-3 col-lg-3 col-xl-2 d-flex">
                        
                                        
                                           
                                            <button class="btn btn-link px-2"
                                            onclick="this.parentNode.querySelector('input[type=number]').stepDown()">
                                            <i class="fas fa-minus"></i>
                                            </button>
                                            <button class="btn btn-link px-2"
                                            onclick="this.parentNode.querySelector('input[type=number]').stepUp()">
                                            <i class="fas fa-plus"></i>
                                            </button>
                                                    
                                            <form action="{{url('cart/quantity/update/'.$c->c_id)}}" method="post">
                                            @csrf
                                            
                                                    <input id="form1" min="1" name="quantity" style="width:50px" value="{{$c->p_quantity}}" type="number"
                                                    class="form-control form-control-sm" />

                                                    
                                           

                                </div>       
                            
                        </td>
                        <td>
                            <button type="Submit" class="btn btn-info" >Update</button>
                            </form>
                        
                        </td>
                        <td>
                                 {{$c->p_price * $c->p_quantity}}    
                        </td>
                            <td>
                            <a href="{{url('cart/destroy/'.$c->c_id)}}"><button type="button" class="btn-close btn-close-white" aria-label="Close"></button></a>
                            </td>
                      
                    </tr>
                        
                
                    @endforeach

                    <tr>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        
                    </tr>
                    
                    
            </table>

                    <a href="{{route('buyer.other.dashboard')}}"><button type="button" class="btn btn-success">Continue Shopping</button></a>
            <br><br>
            



            @if(session('validCoupon'))
                <div class="alert alert-success" role="alert">
                    <b>{{session('validCoupon')}}</b>
                    
                </div>
            @endif

            @if(session('invalidCoupon'))
                <div class="alert alert-danger" role="alert">
                    <b>{{session('invalidCoupon')}}</b>
                    
                </div>
            @endif


            @if(session('destroyCoupon'))
                <div class="alert alert-danger" role="alert">
                    <b>{{session('destroyCoupon')}}</b>
                    
                </div>
            @endif





            <div class="coupon" >
                <form action="{{url('coupon/apply')}}" method="post">
                    @csrf
                    <input type="text" name="coupon" placeholder="Enter you coupon code">
                    <button type="Submit" class="btn btn-warning">Apply Coupon</button>
                </form>
            </div>


            <div class="cart_total" style="float:right" >

                        <table class="table  table-striped table-dark" style="width:300px">
                            <tr>
                                <td>Cart Total</td>
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
                            <tr>
                          
                                <td> Coupon</td>
                                <td>:</td>
                                <td>
                                        
                                        {{session()->get('coupon')['cpn_name']}}
                                        <a href="{{url('coupon/destroy')}}"><button type="button" style="float:right" class="btn-close btn-close-white" aria-label="Close"></button></a>
                                </td>
                            </tr>
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
    <a href="{{route('buyer.other.checkout')}}"><button type="button"  style="width:100%" class="btn btn-success">PROCEED TO CHECKOUT</button></a>
    <hr>
    <div class="col-sm-1">
      
    


    </div>
  </div>
</div>


@endsection