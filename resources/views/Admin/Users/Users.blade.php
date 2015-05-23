@extends('Admin.master')

@section('content')

  <div class="row">
  <div class="col-md-8 col-md-offset-2">


	@if(Session::has('success'))
		<div class="alert alert-success">{{ Session::get('success') }}</div>
	@elseif (Session::has('fail'))
		<div class="alert alert-danger">{{ Session::get('fail') }}</div>
	@endif

    			<h4 >Users:</h4>
    			Add new user: <a class="glyphicon glyphicon-plus" href="{{ URL::route('Admin-Users-add') }}"></a>

	<table class="table table-striped table-bordered">
    <thead>
        <tr>
        	<td>ID</td>
            <td>Name</td>
            <td>E-mail</td>
            <td>Admin-is(1:is|0:isn't)</td>
            <td>Created</td>
            <td>Updated</td>
            <td>Options</td>

        </tr>
    </thead>
    <tbody>
    @foreach($User as $key => $value)
        <tr>
            <td>{{ $value->id }}</td>
            <td>{{ $value->name }}</td>
            <td>{{ $value-> email}}</td>
             <td>{{ $value->isAdmin }}</td>
              <td>{{ $value->created_at }}</td>
            <td>{{ $value->updated_at }}</td>
            <td><a class=" glyphicon glyphicon-remove" href="{{ URL::route('Admin-Users-delete',$value->id) }}"> &nbsp <a class="glyphicon glyphicon-pencil" href="{{ URL::route('Admin-Users-edit',$value->id) }}"></td>

       
            
        </tr>

    @endforeach
    </tbody>
</table>
{!! $User->render() !!}

			
    </div>
   </div>



@endsection
@stop