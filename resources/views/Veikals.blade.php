@extends ('app')

@section ('content')

  <div class="row">
  <div class="col-md-8 col-md-offset-2">


	@if(Session::has('success'))
		<div class="alert alert-success">{{ Session::get('success') }}</div>
	@elseif (Session::has('fail'))
		<div class="alert alert-danger">{{ Session::get('fail') }}</div>
	@endif

    			<h4 >Preču Grupu izvelne</h4>

          

    	

    		
    		@foreach($groups as $group)

<div class="panel panel-default" style="width:250px;height: 250px;float:left;  border-width: 2px;margin: 10px;">
  <div class="panel-heading" ><a href="{{ URL::route('shop-category', $group->id) }}">{{ $group->Group_name }}</a></li></div>
  <div class="panel-body col-lg-1 col-centered">
      @foreach($Image_groups as $Image_group)
      @if($group->id == $Image_group->grupas_ID)
      <div>
       <img src="{{asset($Image_group->image)}}" alt="{{$Image_group->id}}" style="width:200px;height:100px"  > 
     </div>

      @endif
      @endforeach
      <br>
      <div style="width:200px;">
   <h4>{{ $group->Group_desc }}</h4>

  </div>
</div></div>

			@endforeach
			
    </div>
   </div>

  
@stop