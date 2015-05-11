@extends('Admin.master')

@section('content')

  <div class="row">
  <div class="col-md-8 col-md-offset-2">


	@if(Session::has('success'))
		<div class="alert alert-success">{{ Session::get('success') }}</div>
	@elseif (Session::has('fail'))
		<div class="alert alert-danger">{{ Session::get('fail') }}</div>
	@endif

    			<h4 >Produktu Datubāzē!</h4>
    			Pievienot Jaunu Produktu: <a class="glyphicon glyphicon-plus" href="{{ URL::route('Admin-Products-add') }}"></a>

	<table class="table table-striped table-bordered">
    <thead>
        <tr>
        	<td>ID</td>
            <td>Nosaukums</td>
            <td>Apraksts</td>
            <td>Kategorijas ID</td>
            <td>price</td>
            <td>Izveidots</td>
            <td>Izmainīts</td>
            <td>Iespējas</td>

        </tr>
    </thead>
    <tbody>
    @foreach($Products as $key => $value)
        <tr>
            <td>{{ $value->id }}</td>
            <td>{{ $value->title}}</td>
            <td>{{ $value->description}}</td>
            <td>{{ $value->category_ID}}</td>
            <td>{{ $value->price}}</td>
            <td>{{ $value->created_at}}</td>
            <td>{{ $value->updated_at }}</td>
            <td><a class=" glyphicon glyphicon-remove" href="{{ URL::route('Admin-Products-delete',$value->id) }}"> &nbsp <a class="glyphicon glyphicon-pencil" href="{{ URL::route('Admin-Products-edit',$value->id) }}"></td>

       
        </tr>

    @endforeach
    </tbody>
</table>
{!! $Products->render() !!}

			
    </div>
   </div>



@endsection
@stop