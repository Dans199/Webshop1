@extends('Admin.master')

@section('content')

  <div class="row">
  <div class="col-md-8 col-md-offset-2">



    			<h4 >Jaunas Akcijas Pievienošana!</h4>

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

    {!! Form::open(['files'=>true]) !!}
  
            Akcijas Nosaukums<br />
            {!! Form::text('name', null, ['id' => 'name']) !!}
     
        <br />
        
                 Akcijsa Beigas:<br />
            {!! Form::input('date','end_time', null, ['placeholder' => 'yyyy-mm-dd', 'id' => 'end_time']) !!}
     
        <br />

        <div class="control-group">
          <div class="controls">
            Izvēlieties bildi Akcijai! <br/>
          {!! Form::file('image') !!}
          <br/>

        {!! Form::submit('Pievienot Akciju!') !!}

    </div>
   </div>

@endsection
@stop