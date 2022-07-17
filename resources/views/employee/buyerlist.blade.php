@extends('employee.layout.navbar1')
@section('content')
<div class="container">
<table class="table">

<h3>Buyer Profile</h3>

  <thead>
    <tr>
      <td >Buyer Name</td>
      <td >Buyer Phone</td>
      <td >Buyer Email</td>
      <td >Buyer Address</td>
    </tr>
  </thead>
 <tbody>
    @foreach($buyer as $buyerlist)
    <tr>
      <td>{{$buyerlist->b_name}}</td>
      <td>{{$buyerlist->b_phn}}</td>
      <td>{{$buyerlist->b_mail}}</td>
      <td>{{$buyerlist->b_add}}</td>
      <td>
        
        <a href="{{'editbuyer/'.$buyerlist->b_id}}" class = "btn btn-sm btn-info"> Edit </a> 
         

      </td>
    </tr> 
    </tbody>
@endforeach
</table>
</div>
@endsection

