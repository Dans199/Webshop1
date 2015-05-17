@extends('Admin.master')

@section('content')
  <div class="row">
  <div class="col-md-8 col-md-offset-2">

   <h3><strong>Galerija: </strong>Grupas</h3>
   <br>
   <br>

   @foreach($grupas as $group)

   <div class="panel panel-default" style="width:250px;height: 250px;float:left;">
  <div class="panel-heading" > <a href="">{{ $group->Group_name }}</a></div>
  <div class="panel-body col-lg-1 col-centered">
      @foreach($groups as $Image_group)
      @if($group->id == $Image_group->grupas_ID)
      <div>
       <img src="{{asset($Image_group->image)}}" alt="{{$Image_group->id}}"  width="230" height="150" > 
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