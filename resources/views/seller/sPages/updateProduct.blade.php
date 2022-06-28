@extends('seller.layouts.navbar')
@section('content')
<div class="w-75 p-3 justify-content-center">
    <h3>Update Product Information</h3>
    <form action="{{route('seller.postUpdate')}}" method="POST" enctype="multipart/form-data">
        @csrf
        <input type="hidden" name="p_id" value="{{$data->p_id}}">
        <div class="form-group">
            <label>Product Title</label>
            <input type="text" value="{{$data->p_title}}" name="p_title" class="form-control">
        </div>
        @error('p_title')
        <span class="text-danger">{{$message}}</span>
        @enderror
        <br>
        <div class="form-group">
            <label>Brand Name</label>
            <input type="text" value="{{$data->p_brand}}" name="brand_name" class="form-control">
        </div>
        @error('brand_name')
        <span class="text-danger">{{$message}}</span>
        @enderror
        <br>
        <div class="form-group">
            <label>Product Price</label>
            <input type="text" value="{{$data->p_price}}" name="price" class="form-control">
        </div>
        @error('price')
        <span class="text-danger">{{$message}}</span>
        @enderror
        <br>
        <div class="form-group">
            <label>Quantity</label>
            <input type="number" value="{{$data->p_quantity}}" name="qnty" class="form-control">
        </div>
        @error('qnty')
        <span class="text-danger">{{$message}}</span>
        @enderror
        <br>
        <div class="form-group">
            <label>Description</label>
            <textarea class="form-control" name="desc" rows="5" placeholder="Write about your product...">{{$data->p_description}}</textarea>
        </div>
        @error('desc')
        <span class="text-danger">{{$message}}</span>
        @enderror
        <br>
        <div class="form-group">
            <label>Product Photo</label>
            <img src="{{ asset ('images/' . $data->image_path)}}" width="300px" alt="">
            <input type="file" name="image" class="form-control-file">
        </div>
        @error('image')
        <span class="text-danger">{{$message}}</span>
        @enderror
        <br>
        <div>
            <button type="submit" class="btn btn-primary my-1">Submit</button>
        </div>
    </form>
</div>
@endsection
