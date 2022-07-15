@extends('employee.layout.navbar1')
@section('content')

<h1>Welcome to My Buyerlist</h1>

<div class="container">
<table class="table">
  <thead>
    <tr>
      <td >Buyer Name</td>
      <td >Buyer Phone</td>
      <td >Buyer Email</td>
      <td >Buyer Address</td>
    </tr>
  </thead>
 <tbody>
    @foreach($buyer as $buyerList)
    <tr>
      <td>{{$$buyerList->b_name}}</td>
      <td>{{$$buyerList->b_phn}}</td>
      <td>{{$$buyerList->b_mail}}</td>
      <td>{{$$buyerList->b_add}}</td>
     

    </tr> 
    </tbody>
@endforeach
</table>
</div>
@endsection

