@extends('Admin.master')

@section('content')

  <div class="row">
  <div class="col-md-8 col-md-offset-2">


	@if(Session::has('success'))
		<div class="alert alert-success">{{ Session::get('success') }}</div>
	@elseif (Session::has('fail'))
		<div class="alert alert-danger">{{ Session::get('fail') }}</div>
	@endif

    			<h4 >Grupas Datubāzē!</h4>
    			Pievienot Jaunu grupu: <a class="glyphicon glyphicon-plus" href="{{ URL::route('Admin-grupas-add') }}"></a>

	<table class="table table-striped table-bordered">
    <thead>
        <tr>
        	<td>ID</td>
            <td>Grupas Nosaukums</td>
            <td>Apraksts</td>
            <td>Izveidots</td>
            <td>Izmainīts</td>
            <td>Iespējas</td>

        </tr>
    </thead>
    <tbody>
    @foreach($groups as $key => $value)
        <tr>
            <td>{{ $value->id }}</td>
            <td>{{ $value->Group_name }}</td>
            <td>{{ $value->Group_desc}}</td>
            <td>{{ $value->created_at}}</td>
            <td>{{ $value->updated_at }}</td>
            <td><a class=" glyphicon glyphicon-remove" href="{{ URL::route('Admin-grupas-delete',$value->id) }}"> &nbsp <a class="glyphicon glyphicon-pencil" href="{{ URL::route('Admin-grupas-edit',$value->id) }}"></td>

       
            
        </tr>

    @endforeach
    </tbody>
</table>

			
    </div>
   </div>



@endsection
@stop