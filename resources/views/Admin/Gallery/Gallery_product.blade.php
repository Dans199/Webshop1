@extends('Admin.master')

@section('content')
  <div class="row">
  <div class="col-md-8 col-md-offset-2">

   <h3><strong>Galerija: </strong>Produkti</h3>
   <br>
   <br>

    @if(Session::has('success'))
    <div class="alert alert-success">{{ Session::get('success') }}</div>
  @elseif (Session::has('fail'))
    <div class="alert alert-danger">{{ Session::get('fail') }}</div>
  @endif

   @foreach($Products as $Product)

   <div class="panel panel-default" style="width:250px;height: 250px;float:left;">
  <div class="panel-heading" >{{ $Product->title }}</div>
  <div class="panel-body col-lg-1 col-centered">
      @foreach($Image_Product as $Image_P)
      @if($Product->id == $Image_P->product_id)
      <div style="width:200px;">
       <img src="{{asset($Image_P->image)}}" alt="{{$Image_P->id}}"  width="230" height="150" >
       <br>
       <a class=" glyphicon glyphicon-remove" href="{{ URL::route('Admin-Products-delete',$Product->id) }}"></a> <a class="glyphicon glyphicon-pencil" href="{{ URL::route('Admin-gallery-products-Edit',$Product->id) }}"></a>
     </div>
       


      @endif

      @endforeach
   
</div></div>


			@endforeach

      {!! $Products->render() !!}
			
    </div>
   </div>

    






@endsection
@stop