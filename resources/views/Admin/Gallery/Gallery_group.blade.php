@extends('Admin.master')

@section('content')
  <div class="row">
  <div class="col-md-8 col-md-offset-2">

   <h3><strong>Gallery: </strong>Groups</h3>
   <br>
   <br>
    @if(Session::has('success'))
    <div class="alert alert-success">{{ Session::get('success') }}</div>
  @elseif (Session::has('fail'))
    <div class="alert alert-danger">{{ Session::get('fail') }}</div>
  @endif

   @foreach($grupas as $group)

   <div class="panel panel-default" style="width:250px;height: 250px;float:left;">
  <div class="panel-heading" > {{ $group->Group_name }}</div>
  <div class="panel-body col-lg-1 col-centered">
      @foreach($groups as $Image_group)
      @if($group->id == $Image_group->grupas_ID)
      <div style="width:200px;">
       <img src="{{asset($Image_group->image)}}" alt="{{$Image_group->id}}"  width="230" height="150" > 
       <br>
       <a class=" glyphicon glyphicon-remove" href="{{ URL::route('Admin-grupas-delete',$group->id) }}"></a> <a class="glyphicon glyphicon-pencil" href="{{ URL::route('Admin-gallery-groups-Edit', $group->id) }}"></a>
     </div>

      @endif
      @endforeach
   
</div></div>

			@endforeach
			
    </div>
   </div>

    


    </div>
   </div>




@endsection
@stop