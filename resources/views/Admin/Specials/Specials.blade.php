@extends('Admin.master')

@section('content')

  <div class="row">
  <div class="col-md-8 col-md-offset-2">


	@if(Session::has('success'))
		<div class="alert alert-success">{{ Session::get('success') }}</div>
	@elseif (Session::has('fail'))
		<div class="alert alert-danger">{{ Session::get('fail') }}</div>
	@endif

    			<h4 >Specials!</h4>
    			Add new special: <a class="glyphicon glyphicon-plus" href="{{ URL::route('Admin-Specials-add') }}"></a>

	<table class="table table-striped table-bordered">
    <thead>
        <tr>
        	<td>ID</td>
            <td>Name</td>
            <td>Ends at</td>
            <td>Created</td>
            <td>Updated</td>
            <td>Options</td>

        </tr>
    </thead>
    <tbody>
    @foreach($Specials as $key => $value)
        <tr>
            <td>{{ $value->id }}</td>
            <td>{{ $value->name}}</td>
            <td>{{ $value->end_time}}</td>
            <td>{{ $value->created_at}}</td>
            <td>{{ $value->updated_at }}</td>
            <td><a class=" glyphicon glyphicon-remove" href="{{ URL::route('Admin-Specials-delete',$value->id) }}"> &nbsp <a class="glyphicon glyphicon-pencil" href="{{ URL::route('Admin-special-edit',$value->id) }}"></td>

       
        </tr>

    @endforeach
    </tbody>
</table>
{!! $Specials->render() !!}

			
    </div>
   </div>
   </div>


@endsection
@stop