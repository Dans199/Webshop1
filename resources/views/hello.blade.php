@extends ('app')

@section ('content')

	@if(Session::has('success'))
		<div class="alert alert-success">{{ Session::get('success') }}</div>
	@elseif (Session::has('fail'))
		<div class="alert alert-danger">{{ Session::get('fail') }}</div>
	@endif

  <div class="row">
  <div class="col-md-8 col-md-offset-2">

  	        <img width="460" height="215" src="upload/2.jpg" alt="Pro gaming pic"> 

		 <h2>Sveicināti internetveikalā TSG  </h2>
		 <br>
			<h3>Pie mums var  iegādāties visa  vaida datoru preces par izdevīgām cenām!</h3>
			<br>

    	<br> 
    	<br>
    	<h4> Lētu gaming datoru var salikt  kopā jebkurš no mums:) </h4>
    		<iframe width="460" height="215" src="https://www.youtube.com/embed/rQtUWjgxrd8" frameborder="0" allowfullscreen></iframe>
    	<p>This web page was created by Dans Grīnšteins (dg13030). :) !!!</p>
    </div>
   </div>


  
@stop