@extends('employee.layout.navbar1')
@section('content')

<h1>Welcome to My Buyerlist</h1>

<div class="container">
<table class="table">
  <thead>
    <tr>
      <td >Seller Name</td>
      <td >Seller Phone</td>
      <td >Seller Email</td>
      <td >Seller Address</td>
    </tr>
  </thead>
 <tbody>
    @foreach($seller as $sellerList)
    <tr>
      <td>{{$$sellerList->s_name}}</td>
      <td>{{$$sellerList->s_phn}}</td>
      <td>{{$$sellerList->s_mail}}</td>
      <td>{{$$sellerList->s_add}}</td>
     

    </tr> 
    </tbody>
@endforeach
</table>
</div>
@endsection
