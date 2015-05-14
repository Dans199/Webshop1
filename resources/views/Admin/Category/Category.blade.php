@extends('Admin.master')

@section('content')

  <div class="row">
  <div class="col-md-8 col-md-offset-2">


	@if(Session::has('success'))
		<div class="alert alert-success">{{ Session::get('success') }}</div>
	@elseif (Session::has('fail'))
		<div class="alert alert-danger">{{ Session::get('fail') }}</div>
	@endif

    			<h4 >Kategorijas Datubāzē!</h4>
    			Pievienot Jaunu Kategoriju: <a class="glyphicon glyphicon-plus" href="{{ URL::route('Admin-category-add') }}"></a>

	<table class="table table-striped table-bordered">
    <thead>
        <tr>
        	<td>ID</td>
            <td>Kategorijas Nosaukums</td>
            <td>Apraksts</td>
            <td>Grupas ID</td>
            <td>Izveidots</td>
            <td>Izmainīts</td>
            <td>Iespējas</td>

        </tr>
    </thead>
    <tbody>
    @foreach($Categorys as $key => $value)
        <tr>
            <td>{{ $value->id }}</td>
            <td>{{ $value->name}}</td>
            <td>{{ $value->desc}}</td>
            <td>{{ $value->grupas_ID}}</td>
            <td>{{ $value->created_at}}</td>
            <td>{{ $value->updated_at }}</td>
            <td><a class=" glyphicon glyphicon-remove" href="{{ URL::route('Admin-Categories-delete',$value->id) }}"> &nbsp <a class="glyphicon glyphicon-pencil" href="{{ URL::route('Admin-category-edit',$value->id) }}"></td>

       
        </tr>

    @endforeach
    </tbody>
</table>
{!! $Categorys->render() !!}

			
    </div>
   </div>



@endsection
@stop