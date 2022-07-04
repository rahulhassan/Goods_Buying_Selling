@extends('seller.layouts.navbar')
@section('content')
<hr>
<h4 style="text-align:center;font-family: myFirstFont;">Seller Order</h4>
<hr>
<div class="w-75 p-3 justify-content-center">

    <table class="table table-striped">
        <thead>
          <tr>
            <th scope="col">No</th>
            <th scope="col">Product Title</th>
            <th scope="col">Quantity</th>
            <th scope="col">Amount</th>
            <th scope="col"></th>
          </tr>
        </thead>
        <tbody>
        @foreach ($order_item as $or)
            <tr>
              <td>{{$loop->iteration}}</td>
              <td>{{$or->p_id}}</td>
              <td>{{$or->p_quantity}}</td>

              <td>{{$order->total}}</td>
              <td>
                <a href="{{'shipping/'.$or->id}}"><button type="button" class="btn btn-success">Order Shifted</button></a>
              </td>
            </tr>   
        @endforeach
        </tbody>
      </table>

</div>
@endsection