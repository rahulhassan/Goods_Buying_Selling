@extends('seller.layouts.navbar')
@section('content')
<hr>
<h4 style="text-align:center;font-family: myFirstFont;">Post Product</h4>
<hr>
<div class="w-75 p-3 justify-content-center">
    <form action="{{route('submit.sellerPost')}}" method="POST" enctype="multipart/form-data">
        @if(Session::has('success'))
        <div class="alert alert-success">{{Session::get('success')}}</div>
        @endif
        @if(Session::has('fail'))
        <div class="alert alert-danger">{{Session::get('fail')}}</div>
        @endif
        @csrf
        <div class="form-group">
            <label>Product Title</label>
            <input type="text" value="{{old('p_title')}}" name="p_title" class="form-control">
        </div>
        @error('p_title')
        <span class="text-danger">{{$message}}</span>
        @enderror
        <br>
        <div class="form-group">
            <label>Brand Name</label>
            <input type="text" value="{{old('brand_name')}}" name="brand_name" class="form-control">
        </div>
        @error('brand_name')
        <span class="text-danger">{{$message}}</span>
        @enderror
        <br>
        <div class="form-group">
            <label for="exampleFormControlSelect1">Category</label>
            <select class="form-control" name="category_name">
                <option>TV</option>
                <option>Computer</option>
                <option>Mobile</option>
                <option>Camera</option>
                <option>Fridge</option>
                <option>Accessories</option>
            </select>
        </div>
        @error('category_name')
        <span class="text-danger">{{$message}}</span>
        @enderror
        <br>
        <div class="form-group">
            <label>Product Price</label>
            <input type="text" value="{{old('price')}}" name="price" class="form-control">
        </div>
        @error('price')
        <span class="text-danger">{{$message}}</span>
        @enderror
        <br>
        <div class="form-group">
            <label>Quantity</label>
            <input type="number" value="{{old('qnty')}}" name="qnty" class="form-control">
        </div>
        @error('qnty')
        <span class="text-danger">{{$message}}</span>
        @enderror
        <br>
        <div class="form-group">
            <label>Description</label>
            <textarea class="form-control" name="desc" rows="3" placeholder="Write about your product...">{{old('desc')}}</textarea>
        </div>
        @error('desc')
        <span class="text-danger">{{$message}}</span>
        @enderror
        <br>
        <div class="form-group">
            <label>Product Photo</label>
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