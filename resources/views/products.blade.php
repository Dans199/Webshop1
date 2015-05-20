@extends ('app')

@section ('content')

  <div class="row">
  <div class="col-md-8 col-md-offset-2">


	@if(Session::has('success'))
		<div class="alert alert-success">{{ Session::get('success') }}</div>
	@elseif (Session::has('fail'))
		<div class="alert alert-danger">{{ Session::get('fail') }}</div>
	@endif
  <h4>Produkti</h4>

    		@foreach($products as $product)

<div class="panel panel-default" style="width:800px;height: 230px; border-width: 2px;margin: 10px;">
  <div class="panel-heading" ><a href="{{ URL::route('product-info', $product->id) }}">{{ $product->title }}</a></li></div>
  <div class="panel-body col-lg-1 col-centered">

       @foreach($Image_Products as $Image_Product)
      @if($product->id == $Image_Product->product_id)
      <div style="Float:left;">
       <img src="{{asset($Image_Product->image)}}" alt="{{$Image_Product->id}}" style="width:160px;height:100px;border-width: 2px;margin: 10px;" > 
     </div>
      @endif
      @endforeach

      <div style="width:650px;">

       Apraksts:
     <p  style="border-width: 2px;margin: 10px;" >{{ $product->description }}<p>
     </div>

     



  
  
   <div style="Float:right;">
     Cena:
    <strong>{{ $product->price }}</strong>
  </div>
  </div>
</div>
<br>

			@endforeach
			
    </div>
   </div>

  
@stop