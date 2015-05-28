@extends ('app')

@section ('content')

  <div class="row">
  <div class="col-md-8 col-md-offset-2" style="border-right: thick double #98bf21;border-left: thick double #98bf21;">




	@if(Session::has('success'))
		<div class="alert alert-success">{{ Session::get('success') }}</div>
	@elseif (Session::has('fail'))
		<div class="alert alert-danger">{{ Session::get('fail') }}</div>
	@endif
  <h4>Categories</h4>


    <div class="clearfix">
    <ol class="breadcrumb pull-left">
      <li><a href="{{ URL::route('veikals') }}">Shop</a></li>
      <li class="active">{{$group->Group_name}}</li>

    </ol>
  </div>

    		@foreach($categorys as $category)

<div class="panel panel-default" style="width:250px;height: 250px;float:left;  border-width: 2px;margin: 10px;">
  <div class="panel-heading" ><a href="{{ URL::route('shop-product', $category->id) }}">{{ $category->name }}</a></li></div>
  <div class="panel-body col-lg-1 col-centered">
          @foreach($Image_Category as $Cat_image)
      @if($category->id == $Cat_image->category_id)
      <div>
        <a href="{{ URL::route('shop-product', $category->id) }}"><img src="{{ asset($Cat_image->image) }}" alt="{{$Cat_image->id}}" style="width:200px;height:100px"></a> 
     </div>

     @endif
      @endforeach
      <br>
      <div style="width:200px;">
   <h4>{{ $category->desc }} </h4>
  </div>
    </div>
</div>

			@endforeach
			
    </div>
   </div>

  
@stop