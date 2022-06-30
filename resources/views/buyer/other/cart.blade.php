
@extends('buyer/main/navbar1')
@section('contents')
<script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<hr>
<h4 style="text-align:center;font-family: myFirstFont;">Shopping Cart </h4>
<hr> 

<!-- <section class="shoping-cart spad">
<div class="container">
    <div class="row">
        <div class="col-lg-12">
                <div class="shoping__cart__table">
                    <table>
                        <thead>
                            <tr>
                                <th class="shopping__product">Products</th>
                                <th>Price</th>
                                <th>Quantity</th>
                                <th>Total</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td class="shoping__cart__item">
                                    <img src="" alt="">
                                </td>
                                <td class="shoping__cart__price"></td>
                                <td class="shoping__cart__quantity">
                                    <div class="quantity">
                                        <div class="pro-qty">

                                        </div>
                                    </div>
                                </td>
                                <td class="shoping__cart__item"></td>
                                <td></td>
                            </tr>
                            
                        </tbody>
                    </table>
                </div>
        </div>
    </div>
</div>
</section>

 -->






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
 
            <table class="table  table-striped table-dark" style>
                    <tr>
                        <th>Products</th>
                        <th>Price</th>
                        <th>Quantity</th>
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

                                                       

                                                        <button type="Submit" class="btn btn-info">Update</button>
                                                </form>

                                </div>       
                            
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
                        <td>{{$total}}</td>
                        <td></td>
                    </tr>
            </table>

                    <a href="{{route('buyer.other.dashboard')}}"><button type="button" class="btn btn-success">Continue Shopping</button></a>
            <br>
            
           

    </div>
    <div class="col-sm-1">
      
    


    </div>
  </div>
</div>


@endsection