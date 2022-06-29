
@extends('buyer/main/navbar')
@section('contents')
<hr>
<h3 style="text-align:center">My Previous Orders </h3>
<hr>
<div class="container">
  <div class="row">
    <div class="col-sm">
     
        

    </div>
    <div class="col-sm">

<table class="table table-striped table-active"> 
 
        @foreach($orders as $ord)

                    <tr>
                        <td rowspan="4"><img src="{{asset('images/'.$ord->image_path)}}" style="border-radius:10px"height="280px" width="300px"></a></td>
                       
                    </tr>
                    <tr>
                       
                    <td>{{$ord->p_title}}</td>
                    </tr>
                    <tr>
                        <td>{{$ord->p_price}}</td>
                        
                    </tr>
                    <tr>
                        <td>{{$ord->p_quantity}}</td>
                    </tr>
                    <tr>
                        <td>{{$ord->status}}</td>
                    </tr>
       
        @endforeach
        
</table>
    </div>
    <div class="col-sm">
      
    


    </div>
    </div>
</div>

@endsection