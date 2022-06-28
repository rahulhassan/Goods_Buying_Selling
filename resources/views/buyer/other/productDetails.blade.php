
@extends('buyer/main/navbar')
@section('contents')

<hr>
<h3 style="text-align:center">{{$products->p_title}} </h3>
<hr>
<div class="container" style="padding: 30px 0">
        <div class="row">
       
                <div class="col-sm-4 ">
                <img src="{{asset('images/'.$products->image_path)}}" height="180px" width="200px">
                </div>

                <div class="col-sm-8">


                            <table class="table table-striped  table-hover table-active">
                                
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
                            <a href="{{route('buyer.other.orderDetails',['title'=>$products->p_title])}}"><button type="button" class="btn btn-success" >Buy Now</button></a>
                            <button type="button" class="btn btn-warning" style="margin-left:20px">Add to Cart</button>

            </div>
        </div>
</div>

@endsection