
@extends('buyer/main/navbar1')
@section('contents')
<hr>
<h4 style="text-align:center;font-family: myFirstFont;">My Order List</h4>
<hr>
<div class="container">
  <div class="row">
    <div class="col-sm">
     
        

    </div>
    <div class="col-sm">

<table class="table table-striped table-active"> 
 
        @foreach($orders as $ord)

                    <tr>
                        <td rowspan="4"><img src="{{asset('images/'.$ord->p_image)}}" style="border-radius:10px"height="200px" width="200px"></a></td>
                       
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