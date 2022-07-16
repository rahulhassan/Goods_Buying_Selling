@extends('employee.layout.navbar1')
@section('content')
<div class="container">
<table class="table">

<h3>Employee Profile</h3>

  <thead>
    <tr>
      <td >Employee Name</td>
      <td >Employee Phone</td>
      <td >Employee Email</td>
      <td >Employee Address</td>
    </tr>
  </thead>
 <tbody>
    @foreach($emp as $employee)
    <tr>
      <td>{{$employee->e_name}}</td>
      <td>{{$employee->e_phn}}</td>
      <td>{{$employee->e_mail}}</td>
      <td>{{$employee->e_add}}</td>
      <td>
        
        <a href="{{ url('employee/edit/{id}')}} " class = "btn btn-sm btn-info"> Edit </a> 
         

      </td>
    </tr> 
    </tbody>
@endforeach
</table>
</div>
@endsection

