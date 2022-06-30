
@extends('buyer/main/navbar1')
@section('contents')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<hr>
<h4 style="text-align:center;font-family: myFirstFont;">{{$products->p_title}} </h4>
<hr>
@if(session('cartAdded'))
        <div class="alert alert-success" role="alert">
            <b>{{session('cartAdded')}}</b>
            <!-- <button type="button" class="close" aria-label="Close" data-dismiss="alert">
                <span aria-hidden="true">&times;</span>
            </button> -->
        </div>
@endif

@php 
    $total=App\Models\buyer\CartModel::all()->where('b_id',session()->get('LoggedIn'))->sum(function($t){
        return $t->p_price * $t->p_quantity;
    });

    $quantity=App\Models\buyer\CartModel::all()->where('b_id',session()->get('LoggedIn'))->sum('p_quantity');
@endphp 

Total: {{$total}}
Quantity: {{$quantity}}

<a href="{{route('buyer.other.cart')}}"> Go To Cart </a>
<div class="container" style="padding: 30px 0">
        <div class="row">
       
                <div class="col-sm-4 ">
                <img src="{{asset('images/'.$products->image_path)}}" height="180px" width="200px">
                </div>

                <div class="col-sm-8">


                            <table class="table table-striped  table-hover table-dark">
                                
                                <tr>
                            
                                    <th>Title</th>
                                    <th>Brand</th>
                                    <th>Description</th>
                                    <th>Price</th>
                                    <th>Quantity</th>



                                </tr>
                                
                                <tr>
                            
                                    <td>{{$products->p_title}}</td>
                                    <td>{{$products->p_brand}}</td>
                                    <td>{{$products->p_description}}</td>
                                    <td>{{$products->p_price}}</td>
                                    <td>{{$products->p_quantity}}</td>
                                  
          
                                </tr>

                            </table>
                            <form action="{{route('buyer.other.cartSubmit')}}" method="post">
                                {{@csrf_field()}}
                                <input type="hidden" name="p_id" value="{{$products->p_id}}">
                                <input type="hidden" name="p_price" value="{{$products->p_price}}">
                                <button type="Submit" id="addToCart" onclick="myFunction()" class="btn btn-warning" style="margin-right:20px; float:left">Add to Cart</button>
                            </form>

                          

<!-- {{Session::get('added')}} -->
                            <a href="{{route('buyer.other.orderDetails',['title'=>$products->p_title])}}"><button type="button" class="btn btn-success" style="float:left">Buy Now</button></a>
                            

            </div>
        </div>
</div>

@endsection