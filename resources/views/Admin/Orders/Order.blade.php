@extends('Admin.master')

@section('content')

  <div class="row">
  <div class="col-md-8 col-md-offset-2">


	@if(Session::has('success'))
		<div class="alert alert-success">{{ Session::get('success') }}</div>
	@elseif (Session::has('fail'))
		<div class="alert alert-danger">{{ Session::get('fail') }}</div>
	@endif

    			<h4 >Pasūtijumi !</h4>
    			Pievienot manūali pasūtijumu!: <a class="glyphicon glyphicon-plus" href="{{ URL::route('Admin-category-add') }}"></a>

	<table class="table table-striped table-bordered">
    <thead>
        <tr>
        	<td>ID</td>
            <td>Pasūtītājs</td>
            <td>Adrese</td>
            <td>Pasta indeks</td>
            <td>Telefons</td>
            <td>Lietotājs ID</td>
            <td>Izmainīts</td>
            <td>Iespējas</td>

        </tr>
    </thead>
    <tbody>
    @foreach($Orders as $key => $value)
        <tr>
            <td>{{ $value->id }}</td>
            <td>{{ $value->name}}</td>
            <td>{{ $value->address}}</td>
            <td>{{ $value->p_index}}</td>
            <td>{{ $value->tel}}</td>
            <td>{{ $value->user_id}}</td>
            <td>{{ $value->updated_at }}</td>
            <td><a class=" glyphicon glyphicon-remove" href="{{ URL::route('Admin-grupas-delete',$value->id) }}">
             &nbsp <a class="glyphicon glyphicon-pencil" href="{{ URL::route('Admin-category-edit',$value->id) }}">
             &nbsp <a class="glyphicon glyphicon-folder-open" href="">
         </td>

       
        </tr>

    @endforeach
    </tbody>
</table>
{!! $Orders->render() !!}

			
    </div>
   </div>



@endsection
@stop