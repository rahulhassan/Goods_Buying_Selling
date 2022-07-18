@extends('employee.layout.navbar1')
@section('content')



<div class="container">
<table class="table">
<h3>Seller Profile</h3>
  <thead>
    <tr>
      <td >Seller Name</td>
      <td >Seller Phone</td>
      <td >Seller Email</td>
      <td >Seller Address</td>
    </tr>
  </thead>
 <tbody>
    @foreach($seller as $sellerlist)
    <tr>
      <td>{{$sellerlist->s_name}}</td>
      <td>{{$sellerlist->s_phn}}</td>
      <td>{{$sellerlist->s_mail}}</td>
      <td>{{$sellerlist->s_add}}</td>
      <td>
        
        <a href="{{'editseller/'.$sellerlist->s_id}}" class = "btn btn-sm btn-info"> Edit </a> 
         

      </td>

    </tr> 
    </tbody>
@endforeach
</table>
</div>
@endsection
