
@extends('buyer/main/navbar')
@section('contents')
<br>
<style>
    h3{
        text-align:center;
    }
</style>
<h3>{{$products->p_title}} </h3><br>


<table class="table table-striped  table-hover table-active">
                    
                    <tr>
                        <th></th>
                        <th>Title</th>
                        <th>Brand</th>
                        <th>Description</th>
                        <th>Price</th>
                        <th>Quantity</th>



                    </tr>
                    <tr>
                        <td><img src="{{asset('images/'.$products->image_path)}}" height="180px" width="200px"></a></td>
                        <td >{{$products->p_title}}</td>
                        <td>{{$products->p_brand}}</td>
                        <td>{{$products->p_description}}</td>
                        <td>{{$products->p_price}}</td>
                        <td>{{$products->p_quantity}}</td>
        
                       
                    </tr>
                   

  
            </table>

@endsection