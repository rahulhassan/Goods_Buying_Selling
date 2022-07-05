@extends('employee.layout.navbar1')
@section('content')
<div class="container">
 <div class="row justify-content-center">
  <div class="col-md-8">
    <div class="card">
      <div class="card-header">{{('Add Employee')}} </div>
      <div class="card-body">
        <br><br><br>
         
        <form  action="{{url ('employee/insert}')}}" method="POST" enctype="multipart/form-data" >
        @csrf
        <input type="hidden" name="e_id" value="">
        <div class="form-group">
          <label for="name">Add Employee Name</label>
          <input type="text" class="form-control" name="name" aria-describedby="emailHelp" value = ""> <br><br>
          @error('name')
         <span class="text-danger">{{$message}}</span>
         @enderror
         <br><br>
          <label for="phone">Add Employee Phone</label>
          <input type="text" class="form-control" name="phn" aria-describedby="emailHelp" value ="" > <br><br>
          @error('phone')
          <span class="text-danger">{{$message}}</span>
          @enderror
          <br><br>
          <label for="Email">Add Employee Email</label>
          <input type="text" class="form-control" name="mail" aria-describedby="emailHelp" value = "" > <br><br>
          @error('Email')
         <span class="text-danger">{{$message}}</span>
         @enderror
         <br><br>

          <label for="address">Add Employee Address</label>
          <input type="text" class="form-control" name="add" aria-describedby="emailHelp" value = ""> <br><br>
          @error('address')
         <span class="text-danger">{{$message}}</span>
         @enderror
         <br><br>
          
        </div>
         <button type="submit" class = "btn btn-primary"> Insert </button>
        </form>
      </div>

      </div>
    </div>
  </div>
 </div>
</div>
@endsection

