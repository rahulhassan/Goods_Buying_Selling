@extends('seller.layouts.navbar')
@section('content')
<hr>
<h4 style="text-align:center;font-family: myFirstFont;">Seller Statement</h4>
<hr>
<div class="w-75 p-3 justify-content-center">
<table class="table table-striped">
    <thead>
      <tr>
        <th scope="col">Total selling amount</th>
      </tr>
    </thead>
    <tbody>
        <tr>
          <td><b>BDT {{$total}}</b></td>
        </tr>   
    </tbody>
</table>

<br><br>
<table class="table table-striped">
    <thead>
      <tr>
        <th scope="col">Sellig Product List</th>
      </tr>
    </thead>
    <tbody>
        @foreach ($order as $or)
        <tr>
          <td>{{$loop->iteration.") ".$or->product->p_title}}</td>
        </tr> 
        @endforeach  
    </tbody>
</table>
</div>
@endsection