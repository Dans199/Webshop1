@extends ('app')

@section ('content')

  <div class="row">
  <div class="col-md-8 col-md-offset-2">


	@if(Session::has('success'))
		<div class="alert alert-success">{{ Session::get('success') }}</div>
	@elseif (Session::has('fail'))
		<div class="alert alert-danger">{{ Session::get('fail') }}</div>
	@endif
<!--   <pre>
 {{ print_r($products)}}
</pre> -->

    		@foreach($products as $product)
<h4>{{ $product->title }}</h4>
<div class="panel panel-default" style="border-width: 2px;margin: 10px;">
  <div class="panel-body col-lg-1 col-centered">

      <br>
   {{ $product->description }}
   <div style="Float:right;">

   Cena:
    <strong>{{ $product->price }}</strong>
      <a href="{{ URL::route('add-cart', $product->id )}}">Add to cart!</a>
  </div>
  </div>
</div>

			@endforeach
			
    </div>
   </div>

  
@stop