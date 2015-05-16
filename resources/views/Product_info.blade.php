@extends ('app')

@section ('content')

  <div class="row">
  <div class="col-md-8 col-md-offset-2">


	@if(Session::has('success'))
		<div class="alert alert-success">{{ Session::get('success') }}</div>
	@elseif (Session::has('fail'))
		<div class="alert alert-danger">{{ Session::get('fail') }}</div>
	@endif

<h3>Produkta Informācija!<h3>
  <div>


   <img src="{{asset($Image_Product->image)}}" alt="{{$Image_Product->id}}"  width="300" height="100"  class="img-thumbnail"> 
<div>
 <div>
    <h4><strong>Preces Nosaukums:</strong> {{ $product->title }}</h4>
      <div>
     <strong>Apraksts:</strong> <br>
     {{ $product->description }}
 </div>
  </div>

<div >
    <strong>Cena: </strong>
    € {{ $product->price }} 
    <br>
      <a href="{{ URL::route('add-cart', $product->id )}}">Pievienot Grozam!</a>
  </div>

  </div>
</div>
			

  
@stop