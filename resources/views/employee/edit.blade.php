@extends('employee.layout.navbar1')
@section('content')
<div class="container">
 <div class="row justify-content-center">
  <div class="col-md-8">
    <div class="card">
      <div class="card-header">{{__('Update Catergory')}} </div>
      <div class="card-body">
        <a href="{{url('employee.edit')}}" class ="btn btn-info" 
        ></a>
        <br><br><br>
         
        <form method="post" action="{{url ('employee/update/{id}')}}" >
        @csrf
        <div class="form-group">
          <label for="name">Employee Name</label>
          <input type="text" class="form-control" name="name" aria-describedby="emailHelp" value = ""> <br><br>
          @error('name')
         <span class="text-danger">{{$message}}</span>
         @enderror
         <br><br>
          <label for="phone">Employee Phone</label>
          <input type="text" class="form-control" name="phn" aria-describedby="emailHelp" value ="" > <br><br>
          @error('phone')
          <span class="text-danger">{{$message}}</span>
          @enderror
          <br><br>
          <label for="Email">Employee Email</label>
          <input type="text" class="form-control" name="mail" aria-describedby="emailHelp" value = "" > <br><br>
          @error('Email')
         <span class="text-danger">{{$message}}</span>
         @enderror
         <br><br>

          <label for="address">Employee Address</label>
          <input type="text" class="form-control" name="add" aria-describedby="emailHelp" value = ""> <br><br>
          @error('address')
         <span class="text-danger">{{$message}}</span>
         @enderror
         <br><br>
          
        </div>
         <button type="submit" class = "btn btn-primary"> Update </button>
        </form>
      </div>

      </div>
    </div>
  </div>
 </div>
</div>
@endsection

