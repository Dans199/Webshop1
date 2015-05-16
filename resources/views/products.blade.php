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

      <img width="460" height="215" src="upload/5.jpg"> 

    		@foreach($products as $product)

<div class="panel panel-default" style="border-width: 2px;margin: 10px;">
  <div class="panel-heading" ><a href="{{ URL::route('product-info', $product->id) }}">{{ $product->title }}</a></li></div>
  <div class="panel-body col-lg-1 col-centered">

       @foreach($Image_Products as $Image_Product)
      @if($product->id == $Image_Product->product_id)
      <div style="Float:left;">
       <img src="{{$Image_Product->image}}" alt="{{$Image_Product->id}}" style="width:160px;height:100px"  class="img-thumbnail"> 
     </div>
      @endif
      @endforeach

        Apraksts:
     {{ $product->description }}


  
  
   <div style="Float:right;">
     Cena:
    <strong>{{ $product->price }}</strong>
  </div>
  </div>
</div>

			@endforeach
			
    </div>
   </div>

  
@stop