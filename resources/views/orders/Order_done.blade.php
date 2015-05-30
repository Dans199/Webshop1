@extends ('app')

@section ('content')

	@if(Session::has('success'))
		<div class="alert alert-success">{{ Session::get('success') }}</div>
	@elseif (Session::has('fail'))
		<div class="alert alert-danger">{{ Session::get('fail') }}</div>
	@endif

  <div class="row">
  <div class="col-md-8 col-md-offset-2" style="border-right: thick double #98bf21;border-left: thick double #98bf21;">

  	
  	<div class="col-md-offset-2">

  		  <img width="550" height="300" src="/upload/6.jpg"> 
  	<H4>Thank you for your purchase, you will be contacted by our order specialist!!</h4>
  	<H4>If you want to continue shopping, go to section - &gt; <a href="{{ URL::route('veikals') }}">Shop!<H4>.

  </div>

      
  </div>
  </div>


  
@stop