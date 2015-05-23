@extends('Admin.master')


@section('content')

  <div class="row">
  <div class="col-md-8 col-md-offset-2">


    <h4 >Product information !</h4>

            @foreach($Products as $product)
            @if($product->id==$OrderItem->product_id)
            Product name:<strong>{{ $product->title }}</strong><br>
            @endif
            @endforeach
            Product Quantity:<strong> {{$OrderItem->quantity}}</strong> <br>
            Product Price:<strong>{{ $OrderItem->cena}}</strong> <br>
            Product Product ID:<strong>{{ $OrderItem->product_id}}</strong><br>
            Product Order ID:<strong>{{ $OrderItem->order_id}}</strong><br>
    
    			<h4 >Change product price and quantity !</h4>

                @if (count($errors) > 0)
            <div class="alert alert-danger">
              <strong>Whoops!</strong>There were some problems with your input.<br><br>
              <ul>
                @foreach ($errors->all() as $error)
                  <li>{{ $error }}</li>
                @endforeach
              </ul>
            </div>
          @endif

    {!! Form::open() !!}
    <div style="  width: 700px;float:left;">



           <label for="quantity">
            Product quantity: <br>
            {!! Form::text('quantity', $quantity, ['id' => 'quantity']) !!}
        </label>
        <br />

             <label for="quantity">
            Product price: <br>
            {!! Form::text('cena', $cena, ['id' => 'cena']) !!}
        </label>
        <br />





        {!! Form::submit('Edit!') !!}

    </div>
   </div>

@endsection
@stop