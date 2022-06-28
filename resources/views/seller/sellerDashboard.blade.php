@extends('seller.layouts.navbar')
@section('content')
<div class="container-md p-4">
    <h2 class="p-4 d-flex justify-content-center">Seller Dashboard</h2>
    <h3>Your posted products:</h3>

    @if (!empty($empty))
        <div class="alert alert-success">{{$empty}}</div>
    @endif
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
                    <td>{{$p->p_price}}</td>
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
</div>
@endsection
