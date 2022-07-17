@extends('employee.layout.navbar1')
@section('content')
<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-8">
    <div class="card">
      <div class="card-header">{{('Update Employee')}} </div>
      <div class="card-body">
        <br><br><br>
        
        <form action="{{route('update.employee')}}" method="POST">
          <div class="form-group">
            @csrf
            <input type="hidden" name="e_id" value="{{$data->e_id}}">
            <label for="name">Employee Name</label>
            <input type="text" class="form-control" name="e_name"  value = " {{$data->e_name}}"> <br>
            @error('e_name')
            <span class="text-danger">{{$message}}</span>
            @enderror
            <br><br>
            <label for="phone">Employee Phone</label>
            <input type="text" class="form-control" name="e_phn" value ="{{$data->e_phn}} " > <br>
            @error('e_phn')
            <span class="text-danger">{{$message}}</span>
            @enderror
            <br><br>
            <label for="Email">Employee Email</label>
            <input type="text" class="form-control" name="e_mail"  value = "{{$data->e_mail}}"> <br>
            @error('e_mail')
            <span class="text-danger">{{$message}}</span>
            @enderror
            <br><br>

            <label for="address">Employee Address</label>
            <input type="text" class="form-control" name="e_add"  value = "{{$data->e_add}}"> <br>
            @error('e_add')
            <span class="text-danger">{{$message}}</span>
            @enderror
            <br><br>

          </div>
          <button  type="submit" class = "btn btn-primary"> Update </button>
        </form>
      </div>

      </div>
    </div>
  </div>
</div>

@endsection

