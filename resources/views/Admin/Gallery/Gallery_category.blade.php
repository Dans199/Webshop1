@extends('Admin.master')

@section('content')
  <div class="row">
  <div class="col-md-8 col-md-offset-2">

   <h3><strong>Galerija: </strong>Kategorijas</h3>
   <br>
   <br>
    @if(Session::has('success'))
    <div class="alert alert-success">{{ Session::get('success') }}</div>
  @elseif (Session::has('fail'))
    <div class="alert alert-danger">{{ Session::get('fail') }}</div>
  @endif

   @foreach($categories as $cat)

   <div class="panel panel-default" style="width:250px;height: 250px;float:left;">
  <div class="panel-heading" > {{ $cat->name }}</div>
  <div class="panel-body col-lg-1 col-centered">
      @foreach($Image_Category as $Image_Cat)
      @if($cat->id == $Image_Cat->category_id)
      <div style="width:200px;">
       <img src="{{asset($Image_Cat->image)}}" alt="{{$Image_Cat->id}}"  width="230" height="150" > 
       <br>
         <a class=" glyphicon glyphicon-remove" href="{{ URL::route('Admin-Categories-delete',$cat->id) }}"></a> <a class="glyphicon glyphicon-pencil" href="{{ URL::route('Admin-gallery-categories-Edit',$cat->id) }}"></a>
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