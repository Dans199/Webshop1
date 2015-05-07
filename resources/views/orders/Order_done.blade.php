@extends ('app')

@section ('content')

	@if(Session::has('success'))
		<div class="alert alert-success">{{ Session::get('success') }}</div>
	@elseif (Session::has('fail'))
		<div class="alert alert-danger">{{ Session::get('fail') }}</div>
	@endif

  <div class="row">
  <div class="col-md-8 col-md-offset-2">

  	
  	<div style="display: block; margin-left: auto ; margin-right: auto ; vertical-align: middle;">

  		  <img width="460" height="215" src="/upload/6.jpg"> 
  	<p>Paldies par pirkumu, ar jums sazināsies mūsu pasūtījumu speciālists!!</p>
  	<p>Ja vēlaties turpināt iepirkties dodieties uz sadaļu -> <a href="{{ URL::route('veikals') }}">Veikals</a>.

  </div>

      
  </div>
  </div>




  
@stop