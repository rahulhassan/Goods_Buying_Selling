
@extends('buyer/main/navbar')
@section('contents')

<hr>
<h4 style="text-align:center;font-family: myFirstFont;">Choose Your Product </h4>
<hr> 
<div class="container">
  <div class="row">
    <div class="col-sm-3 ">
     
        

    </div>
    <div class="col-sm-6">
 
            <table class="table table-striped table-dark" >
                    
                    @foreach($products as $p)
                    <tr >
                        <td rowspan="4"><a href="{{route('buyer.other.productDetails',['title'=>$p->p_title])}}"><img src="{{asset('images/'.$p->image_path)}}" style="border-radius:10px"height="220px" width="350px"></a></td>
                       
                    </tr>
                    <tr>
                       
                        <td>{{$p->p_title}}</td>
                    </tr>
                    <tr>
                        <td>Price:{{$p->p_price}}</td>
                        
                    </tr>
                    <tr>
                       <!-- <td>{{$p->p_description}}</td> -->
                    </tr>

                        
                            
                
                    @endforeach
            </table>
            <br>
            <div class="row">
                    {{ $products->links() }}
                    
                    <style>
                            
                        .w-5{
                            display:none;
                            
                        }
                    </style>
            </div>
  
           

    </div>
    <div class="col-sm-3">
      
    


    </div>
  </div>
</div>




@endsection