@extends('Admin.master')

@section('content')

  <div class="row">
  <div class="col-md-8 col-md-offset-2">



    			<h4 >Jauna Pasūtijuma Pievienošana!</h4>

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
        <label for="name">
            Pasūtītāja Vards uzvārds<br />
            {!! Form::text('name', null, ['id' => 'name']) !!}
        </label>
        <br />

        <label for="address">
            Pasūtītāja Adrese<br />
            {!! Form::text('address', null, ['id' => 'address']) !!}
        </label>
        <br />

        <label for="p_index">
            Pasūtītāja Pasta Indeks<br />
            {!! Form::text('p_index', null, ['id' => 'p_index']) !!}
        </label>
        <br />

        <label for="tel">
            Pasūtītāja Telefons<br />
            {!! Form::text('tel', null, ['id' => 'tel']) !!}
        </label>
        <br />
      </div>

        {!! Form::submit('Pievienot Pasūtījumu') !!}

    </div>
   </div>

@endsection
@stop