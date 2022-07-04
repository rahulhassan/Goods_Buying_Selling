
@extends('buyer/main/navbar1')
@section('contents')
<hr>
<h4 style="text-align:center;font-family: myFirstFont;">My Order List</h4>
<hr>
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
            <th>Payment Status</th>


                    @foreach($order_items as $ord)
                    <tr>
                    
                        <td><img src="{{asset('images/'.$ord->product->image_path)}}" height="80px" width="80px" alt=""></td>
                        <td>{{$ord->product->p_title}}</td>
                        <td>{{$ord->p_quantity}}</td>
                        <td>{{$ord->p_quantity * $ord->product->p_price}}</td>
                        <td>{{$ord->payment_status}}</td>

                    
                    </tr>
                    
                    @endforeach
          

            
</table>

           
    </div>
    <div class="col-sm-2">
      
    


    </div>
    </div>
</div>


@endsection

