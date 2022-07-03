@extends('seller.layouts.navbar')
@section('content')
<hr>
<h4 style="text-align:center;font-family: myFirstFont;">Update Information</h4>
<hr>
<div class="w-25 p-3 justify-content-center">

    <form action="{{route('submit.sellerInfo')}}" method="POST" enctype="multipart/form-data">
        @csrf
        <input type="hidden" name="s_id" value="{{$data->s_id}}">
        <div class="form-group">
            <label>Seller Photo</label><br>
            <img src="{{ asset ('images/seller/' . $data->s_image)}}" width="300px" alt=""><br><br>
            <input type="file" name="image" class="form-control-file">
        </div>
        @error('image')
        <span class="text-danger">{{$message}}</span>
        @enderror
        <br>
        <label>Name</label>
        <input type="text" name="name" value="{{$data->s_name}}" class="form-control" placeholder="Enter Your Name">
        @error('name')
        <span class="text-danger">{{$message}}</span>
        @enderror
        <br><br>
        <label>Email</label>
        <input type="text" name="email" value="{{$data->s_mail}}" class="form-control" placeholder="Enter Your Email">
        @error('email')
        <span class="text-danger">{{$message}}</span>
        @enderror
        <br><br>
        <label>Phone</label>
        <input type="text" name="phone" value="{{$data->s_phn}}" class="form-control" placeholder="Enter your phone number">
        @error('phone')
        <span class="text-danger">{{$message}}</span>
        @enderror
        <br><br>
        <label>Address</label>
        <input type="text" name="address" value="{{$data->s_add}}" class="form-control" placeholder="Enter your present address">
        @error('address')
        <span class="text-danger">{{$message}}</span>
        @enderror
        <br>
        <button type="submit" class="btn btn-primary">Update</button>
        </div>
      </form>
    </div>
@endsection
