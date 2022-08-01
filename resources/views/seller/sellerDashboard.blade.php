@extends('seller.layouts.navbar')
@section('content')

<hr>
<h4 style="text-align:center;font-family: myFirstFont;">Seller Dashboard</h4>
<hr>
<div class="container-md p-4">

    
    <form class="form-inline" action="">
        @csrf
        <div class="input-group" style="width:50%">
        <input class="form-control mr-sm-2" type="search" placeholder="Write product name..." name="search" value="{{$search}}">
        <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
        </div>
    </form>
    <br>
    <a href="{{'/seller/dashboard/TV'}}"> <button type="button" style="border-radius: 40px;" class="btn btn-outline-secondary">TV</button></a>
    <a href="{{'/seller/dashboard/Computer'}}"><button type="button" style="border-radius: 40px;" class="btn btn-outline-secondary">Computer</button></a>
    <a href="{{'/seller/dashboard/Mobile'}}"><button type="button" style="border-radius: 40px;" class="btn btn-outline-secondary">Mobile & Tablet</button></a>
    <a href="{{'/seller/dashboard/Camera'}}"><button type="button" style="border-radius: 40px;" class="btn btn-outline-secondary">Camera</button></a> 
    <a href="{{'/seller/dashboard/Fridge'}}"><button type="button" style="border-radius: 40px;" class="btn btn-outline-secondary">Fridge</button></a> 
    <a href="{{'/seller/dashboard/Accessories'}}"><button type="button" style="border-radius: 40px;" class="btn btn-outline-secondary">Accessories</button></a> 
    <br>
    
    <br>
    @if (count($productInfo)>0)
    <h3>Your posted products:</h3>
    <div class="w-75">
        @foreach ($productInfo as $p)
        <table class="table table-striped">
            <tbody>
                <tr>
                    <th  rowspan="3"><img src="{{ asset ('images/' . $p->image_path)}}" width="300px" alt=""></th>
                    <th>{{$p->p_title}}</th>
                </tr>
                <tr>
                    <td><b>Brand:</b>{{" ".$p->p_brand}}</td>
                </tr>
                <tr>
                    <td><b>BDT </b>{{$p->p_price}}</td>
                </tr>
                <tr>
                    <td colspan="2">{{$p->p_description}}</td>
                </tr>
                <tr>
                    <td><a href="{{'edit/'.encrypt($p->p_id)}}"><button type="button" class="btn btn-warning">Edit</button></a></td>
                    <td><a href="{{'delete/'.$p->p_id}}"><button type="button" class="btn btn-danger">Delete</button></a></td>
                </tr>
            </tbody>
        </table>
        <br>
        @endforeach
        <div class="row">
            {{$productInfo->links('pagination::bootstrap-4')}}
        </div>
    </div>
    @else
    <h3>You didn't post any product yet.</h3>
    @endif
</div>
@endsection
