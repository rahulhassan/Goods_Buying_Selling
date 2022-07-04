@extends('seller.layouts.navbar')
@section('content')
<hr>
<h4 style="text-align:center;font-family: myFirstFont;">Seller Statement</h4>
<hr>
<div class="w-75 p-3 justify-content-center">
    <table class="table table-striped">
        <thead>
            <tr>
                <th scope="col">Total Selling Amount</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td><b>BDT {{$total}}</b></td>
            </tr>   
        
        </tbody>
    </table>
    <br><br>
    @if (count($order_item)>0)
    <table class="table table-striped">
        <thead>
            <tr>
                <th scope="col">Selled Products</th>
                <th scope="col">Buyer</th>
                <th scope="col">Quantity</th>
                <th scope="col">Date & Time</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($order_item as $or)
            <tr>
                <td>{{$loop->iteration.") ".$or->product->p_title}}</td>
                <td>{{$or->buyer->b_name}}</td>
                <td>{{$or->p_quantity}}</td>
                <td>{{$or->updated_at}}</td>
            </tr>    
            @endforeach    
        </tbody>
    </table>
    @else
    @endif
</div>
@endsection