
@extends('buyer/main/navbar')
@section('contents')
<style>
  
</style>
<br>
<div class="container">
  <div class="row">
    <div class="col-sm">
     
        

    </div>
    <div class="col-sm">
 
            <table class="table table-striped table-active">
                    
                    @foreach($products as $p)
                    <tr>
                        <td rowspan="4"><a href="{{route('buyer.other.productDetails',['title'=>$p->p_title])}}"><img src="{{asset('images/'.$p->image_path)}}" height="180px" width="200px"></a></td>
                       
                    </tr>
                    <tr>
                       
                        <td>{{$p->p_title}}</td>
                    </tr>
                    <tr>
                        <td>{{$p->p_price}}</td>
                        
                    </tr>
                    <tr>
                       
                    </tr>

                        
                            
                
                    @endforeach
            </table>
            <br>

            {{ $products->links() }}
           

    </div>
    <div class="col-sm">
      
    


    </div>
  </div>
</div>




   
    <style>
        
    .w-5{
        display:none;
       
    }
</style>



@endsection