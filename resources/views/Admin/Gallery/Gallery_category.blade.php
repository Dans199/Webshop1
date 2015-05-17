@extends('Admin.master')

@section('content')
  <div class="row">
  <div class="col-md-8 col-md-offset-2">

   <h3><strong>Galerija: </strong>Kategorijas</h3>
   <br>
   <br>

   @foreach($categories as $cat)

   <div class="panel panel-default" style="width:250px;height: 250px;float:left;">
  <div class="panel-heading" > <a href="">{{ $cat->name }}</a></div>
  <div class="panel-body col-lg-1 col-centered">
      @foreach($Image_Category as $Image_Cat)
      @if($cat->id == $Image_Cat->category_id)
      <div>
       <img src="{{asset($Image_Cat->image)}}" alt="{{$Image_Cat->id}}"  width="230" height="150" > 
     </div>

      @endif
      @endforeach
   
</div></div>

			@endforeach

      {!! $categories->render() !!}
			
    </div>
   </div>

    






@endsection
@stop