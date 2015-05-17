@extends('Admin.master')

@section('content')
  <div class="row">
  <div class="col-md-8 col-md-offset-2">

   <h3>Izvēlieties Galeriju:</h3>
   <br>
   <br>

   <div class="list-group">
	 	<a href="{{ URL::route('Admin-gallery-groups') }}" class="list-group-item active">
	    	<h4 class="list-group-item-heading">Grupas</h4>
	    		<p class="list-group-item-text">Šajā sadaļā jūs variet apskatīt visas esošās bildes Grupu sadaļā</p>
	  	</a>
	</div>

	   <div class="list-group">
	 	<a href="{{ URL::route('Admin-gallery-categories') }}" class="list-group-item ">
	    	<h4 class="list-group-item-heading">Kategorijas</h4>
	    		<p class="list-group-item-text">Šajā sadaļā jūs variet apskatīt visas esošās bildes Kategoriju sadaļā</p>
	  	</a>
	</div>


   	<div class="list-group">
	 	<a href="#" class="list-group-item active">
	    	<h4 class="list-group-item-heading">Produkti</h4>
	    		<p class="list-group-item-text">Šajā sadaļā jūs variet apskatīt visas esošās bildes Produktu sadaļā</p>
	  	</a>
	</div>


			
    </div>
   </div>




@endsection
@stop