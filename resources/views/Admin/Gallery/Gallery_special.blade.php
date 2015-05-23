@extends('Admin.master')

@section('content')
  <div class="row">
  <div class="col-md-8 col-md-offset-2">

   <h3><strong>Gallery: </strong>Specials</h3>
   <br>
   <br>
    @if(Session::has('success'))
    <div class="alert alert-success">{{ Session::get('success') }}</div>
  @elseif (Session::has('fail'))
    <div class="alert alert-danger">{{ Session::get('fail') }}</div>
  @endif

   @foreach($specials as $special)

   <div class="panel panel-default" style="width:250px;height: 250px;float:left;">
  <div class="panel-heading" > {{ $special->name }}</div>
  <div class="panel-body col-lg-1 col-centered">
      @foreach($images_Specials as $Image_special)
      @if($special->id == $Image_special->special_id)
      <div style="width:200px;">
       <img src="{{asset($Image_special->image)}}" alt="{{$Image_special->id}}"  width="230" height="150" > 
       <br>
         <a class=" glyphicon glyphicon-remove" href="{{ URL::route('Admin-Specials-delete',$special->id) }}"></a> <a class="glyphicon glyphicon-pencil" href="{{ URL::route('Admin-gallery-special-Edit',$special->id) }}"></a>
     </div>

      @endif
      @endforeach
   
</div></div>

			@endforeach

      {!! $specials->render() !!}
			
    </div>
   </div>

    






@endsection
@stop