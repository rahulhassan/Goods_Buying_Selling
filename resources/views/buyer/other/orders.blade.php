
@extends('buyer/main/navbar1')
@section('contents')


<hr>
<h4 style="text-align:center;font-family: myFirstFont;">My Order List</h4>
<hr>

@if(session('orderDeleted'))
        <div class="alert alert-danger" role="alert">
            <b>{{session('orderDeleted')}}</b>
            
        </div>
@endif



<div class="container">
  <div class="row">
    <div class="col-sm-2">
     
        

    </div>
    <div class="col-sm-8">

<table class="table table-striped table-dark"> 
            <th></th>
            <th>Product Name</th>
            <th>Product Quantity</th>
            <th>Price</th>
            <th>Status</th>
            <th></th>


                    @foreach($order_items as $ord)
                    <tr>
                    
                        <td><img src="{{asset('images/'.$ord->product->image_path)}}" height="80px" width="80px" alt=""></td>
                        <td>{{$ord->product->p_title}}</td>
                        <td>{{$ord->p_quantity}}</td>
                        <td>{{$ord->p_quantity * $ord->product->p_price}}</td>
                        <td>{{$ord->payment_status}}</td>
                        <td><a href="{{url('my_orders/delete/'.$ord->order_id)}}"><button type="button" class="btn btn-danger">Delete</button></td></a>

                    
                    </tr>
                    
                    @endforeach
          

            
</table>

           
    </div>
    <div class="col-sm-2">
      
    


    </div>
    </div>
</div>


@endsection

