@extends('seller.layouts.navbar')
@section('content')
<hr>
<h4 style="text-align:center;font-family: myFirstFont;">Seller Order</h4>
<hr>
<div class="w-75 p-3 justify-content-center">

  @if (count($order_item)>0)

    <table class="table table-striped">
      <thead>
        <tr>
          <th scope="col">No</th>
          <th scope="col">Product Title</th>
          <th scope="col">Quantity</th>
          <th scope="col">Amount</th>
          <th scope="col">Shipping Address</th>
          <th scope="col"></th>
        </tr>
      </thead>
      <tbody>
      @foreach ($order_item as $or)
          <tr>
            <td>{{$loop->iteration}}</td>
            <td>{{$or->product->p_title}}</td>
            <td>{{$or->p_quantity}}</td>

            <td>{{$or->order->total}}</td>
            <td>{{$or->order->buyer->b_add.", ".$or->order->buyer->b_phn}}</td>
            <td>
              <a href="{{'shipping/'.$or->id}}"><button type="button" class="btn btn-success">Order Shifted</button></a>
            </td>
          </tr>   
      @endforeach
      </tbody>
    </table>
  @else
    <h3>There are no order request</h3>
  @endif

</div>
@endsection