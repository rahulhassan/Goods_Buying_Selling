@extends('employee.layout.navbar1')
@section('content')
<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-8">
    <div class="card">
      <div class="card-header">{{('Update Buyer')}} </div>
      <div class="card-body">
        <br><br><br>
        
        <form action="{{route('update.buyer')}}" method="POST">
          <div class="form-group">
            @csrf
            <input type="hidden" name="b_id" value="{{$data->b_id}}">
            <label for="name">Buyer Name</label>
            <input type="text" class="form-control" name="b_name"  value = " {{$data->b_name}}"> <br>
            @error('b_name')
            <span class="text-danger">{{$message}}</span>
            @enderror
            <br><br>
            <label for="phone">Buyer Phone</label>
            <input type="text" class="form-control" name="b_phn" value ="{{$data->b_phn}} " > <br>
            @error('b_phn')
            <span class="text-danger">{{$message}}</span>
            @enderror
            <br><br>
            <label for="Email">Buyer Email</label>
            <input type="text" class="form-control" name="b_mail"  value = "{{$data->b_mail}}"> <br>
            @error('b_mail')
            <span class="text-danger">{{$message}}</span>
            @enderror
            <br><br>

            <label for="address">Buyer Address</label>
            <input type="text" class="form-control" name="b_add"  value = "{{$data->b_add}}"> <br>
            @error('b_add')
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

