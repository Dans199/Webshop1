@extends ('app')

@section ('content')

  <div class="row">
  <div class="col-md-8 col-md-offset-2">


	@if(Session::has('success'))
		<div class="alert alert-success">{{ Session::get('success') }}</div>
	@elseif (Session::has('fail'))
		<div class="alert alert-danger">{{ Session::get('fail') }}</div>
	@endif
  <h4>Kategorijas</h4>

    		@foreach($categorys as $category)

<div class="panel panel-default" style="width:200px;float:left;  border-width: 2px;margin: 10px;">
  <div class="panel-heading" ><a href="{{ URL::route('shop-product', $category->id) }}">{{ $category->name }}</a></li></div>
  <div class="panel-body col-lg-1 col-centered">

      <br>
   {{ $category->desc }}
  </div>
</div>

			@endforeach
			
    </div>
   </div>

  
@stop