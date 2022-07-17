@extends('employee.layout.navbar1')
@section('content')
<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-8">
    <div class="card">
      <div class="card-header">{{('Update Seller')}} </div>
      <div class="card-body">
        <br><br><br>
        
        <form action="{{route('update.seller')}}" method="POST">
          <div class="form-group">
            @csrf
            <input type="hidden" name="s_id" value="{{$data->s_id}}">
            <label for="name">Seller Name</label>
            <input type="text" class="form-control" name="s_name"  value = " {{$data->s_name}}"> <br>
            @error('s_name')
            <span class="text-danger">{{$message}}</span>
            @enderror
            <br><br>
            <label for="phone">Seller Phone</label>
            <input type="text" class="form-control" name="s_phn" value ="{{$data->s_phn}} " > <br>
            @error('s_phn')
            <span class="text-danger">{{$message}}</span>
            @enderror
            <br><br>
            <label for="Email">Seller Email</label>
            <input type="text" class="form-control" name="s_mail"  value = "{{$data->s_mail}}"> <br>
            @error('s_mail')
            <span class="text-danger">{{$message}}</span>
            @enderror
            <br><br>

            <label for="address">Seller Address</label>
            <input type="text" class="form-control" name="s_add"  value = "{{$data->s_add}}"> <br>
            @error('s_add')
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

