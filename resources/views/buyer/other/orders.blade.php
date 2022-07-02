
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
            <th>Sub Total</th>
            <th>Discount</th>
            <th>Total</th>


                    @foreach($order_items as $ord)
                    <tr>
                    
                        <td><img src="{{asset('images/'.$ord->product->image_path)}}" height="80px" width="80px" alt=""></td>
                        <td>{{$ord->product->p_title}}</td>
                        <td>{{$ord->p_quantity}}</td>
                        <td></td>
                        <td></td>
                        <td></td>
                    
                    </tr>
                    
                    @endforeach
          

                    <tr>
                        <td></td>
                        <td><td>     
                        </td></td>
                        <td>{{$orders->sub_total}}</td>
                        <td>{{$orders->discount}}%</td>
                        <td>{{$orders->total}}</td>
                    </tr>
        
</table>

           
    </div>
    <div class="col-sm-2">
      
    


    </div>
    </div>
</div>


@endsection

