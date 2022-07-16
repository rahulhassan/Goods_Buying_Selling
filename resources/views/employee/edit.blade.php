@extends('employee.layout.navbar1')
@section('content')
<div class="container">
 <div class="row justify-content-center">
  <div class="col-md-8">
    <div class="card">
      <div class="card-header">{{('Update Employee')}} </div>
      <div class="card-body">
        <br><br><br>
        
        <form method="POST"  action=" {{url ('/employee/edit')}} " >
        <div class="form-group">
        {{@csrf_field()}}
          <input type="hidden" name="e_id" value="">
          <label for="name">Employee Name</label>
          <input type="text" class="form-control" name="e_name"  value = " "> <br>
          @error('name')
          <span class="text-danger">{{$message}}</span>
         @enderror
         <br><br>
          <label for="phone">Employee Phone</label>
          <input type="text" class="form-control" name="e_phn" value =" " > <br>
          @error('phone')
          <span class="text-danger">{{$message}}</span>
          @enderror
          <br><br>
          <label for="Email">Employee Email</label>
          <input type="text" class="form-control" name="e_mail"  value = "" > <br>
          @error('Email')
         <span class="text-danger">{{$message}}</span>
         @enderror
         <br><br>

          <label for="address">Employee Address</label>
          <input type="text" class="form-control" name="e_add"  value = ""> <br>
          @error('address')
         <span class="text-danger">{{$message}}</span>
         @enderror
         <br><br>
          
        </div>
         <button  type="submit" class = "btn btn-primary"> Update </button> </a>
        </form>
      </div>

      </div>
    </div>
  </div>
 </div>
</div>
@endsection

