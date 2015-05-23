@extends('Admin.master')

@section('content')
  <div class="row">
  <div class="col-md-8 col-md-offset-2">

   <h3><strong>Choose Gallery:</strong></h3>
   <br>
   <br>

   <div class="list-group">
	 	<a href="{{ URL::route('Admin-gallery-groups') }}" class="list-group-item active">
	    	<h4 class="list-group-item-heading">Groups</h4>
	    		<p class="list-group-item-text">Edit groups images | Delete</p>
	  	</a>
	</div>

	   <div class="list-group">
	 	<a href="{{ URL::route('Admin-gallery-categories') }}" class="list-group-item ">
	    	<h4 class="list-group-item-heading">Categories</h4>
	    		<p class="list-group-item-text">Edit Categories images | Delete</p>
	  	</a>
	</div>


   	<div class="list-group">
	 	<a href="{{ URL::route('Admin-gallery-products') }}" class="list-group-item active">
	    	<h4 class="list-group-item-heading">Products</h4>
	    		<p class="list-group-item-text">Edit Products images | Delete</p>
	  	</a>
	</div>

	   	<div class="list-group">
	 	<a href="{{ URL::route('Admin-gallery-special') }}" class="list-group-item ">
	    	<h4 class="list-group-item-heading">Specials</h4>
	    		<p class="list-group-item-text">Edit Specials images | Delete</p>
	  	</a>
	</div>


			
    </div>
   </div>




@endsection
@stop