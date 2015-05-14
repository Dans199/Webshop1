@extends('Admin.master')

@section('content')

  <div class="row">
  <div class="col-md-8 col-md-offset-2">


	@if(Session::has('success'))
		<div class="alert alert-success">{{ Session::get('success') }}</div>
	@elseif (Session::has('fail'))
		<div class="alert alert-danger">{{ Session::get('fail') }}</div>
	@endif 

                <h4 >Pasūtītījuma informācija !</h4>
                <div>
                Pasūtītāja vārds: <strong>{{ $Order->name}}</strong><br />
                Pasūtītāja Adrese: <strong>{{ $Order->address}}</strong><br />
                Pasūtītāja pasta indeks: <strong>{{ $Order->p_index}}</strong><br />
                Pasūtītāja telefons: <strong>{{ $Order->tel}}</strong><br />
                </div>
              
                <h4 >Pasūtītījuma produkti !</h4>
                Pievienot manūali produktus pasūtijumama!: <a class="glyphicon glyphicon-plus" href="{{ URL::route('Admin-Orders-Items-add' ,$id) }}"></a>

	<table class="table table-striped table-bordered">
    <thead>
        <tr>
        	<td>ID</td>
            <td>Preces nosaukums</td>
            <td>Daudzums</td>
            <td>Cena</td>
            <td>Produkta ID</td>
            <td>Pasūtijuma ID</td>
            <td>Izmainīts</td>
            <td>Iespējas</td>

        </tr>
    </thead>
    <tbody>
<!--         <Pre>
        {{print_r($Products)}}
    </pre>
 -->
    @foreach($OrderItems as $key => $value)
        <tr>
            <td>{{ $value->id }}</td>
            @foreach($Products as $product)
            @if($product->id==$value->product_id)
            <td>{{ $product->title }}</td>
            @endif
            @endforeach
            <td>{{ $value->quantity}}</td>
            <td>{{ $value->cena}}</td>
            <td>{{ $value->product_id}}</td>
            <td>{{ $value->order_id}}</td>
            <td>{{ $value->updated_at }}</td>
            <td><a class=" glyphicon glyphicon-remove" href="{{ URL::route('Admin-Orders-Items-Delete',$value->id) }}">
             &nbsp <a class="glyphicon glyphicon-pencil" href="{{ URL::route('Admin-Orders-Items-edit',$value->id) }}">
   
         </td>

       
        </tr>

    @endforeach
    </tbody>
</table>
{!! $OrderItems->render() !!}

			
    </div>
   </div>



@endsection
@stop