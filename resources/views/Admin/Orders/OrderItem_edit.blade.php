@extends('Admin.master')


@section('content')

  <div class="row">
  <div class="col-md-8 col-md-offset-2">


    <h4 >Preces informācija !</h4>

            @foreach($Products as $product)
            @if($product->id==$OrderItem->product_id)
            Preces Nosaukums:<strong>{{ $product->title }}</strong><br>
            @endif
            @endforeach
            Preces Daudzums:<strong> {{$OrderItem->quantity}}</strong> <br>
            Preces Cena:<strong>{{ $OrderItem->cena}}</strong> <br>
            Preces Produkta ID:<strong>{{ $OrderItem->product_id}}</strong><br>
            Preces Pasūtijuma ID:<strong>{{ $OrderItem->order_id}}</strong><br>
    
    			<h4 >Izmainīt cenu vai daudzumu !</h4>

                @if (count($errors) > 0)
            <div class="alert alert-danger">
              <strong>Whoops!</strong> Radās problēma ar jūsu ievadi<br><br>
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
            Preces Daudzums <br>
            {!! Form::text('quantity', $quantity, ['id' => 'quantity']) !!}
        </label>
        <br />

             <label for="quantity">
            Preces Cena <br>
            {!! Form::text('cena', $cena, ['id' => 'cena']) !!}
        </label>
        <br />





        {!! Form::submit('Pievienot Pasūtījumu') !!}

    </div>
   </div>

@endsection
@stop