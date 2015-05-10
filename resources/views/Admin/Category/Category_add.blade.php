@extends('Admin.master')

@section('content')

  <div class="row">
  <div class="col-md-8 col-md-offset-2">



    			<h4 >Jaunas Kategorijas Pievienošana!</h4>

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
        <label for="name">
            Kategorijas Nosaukums<br />
            {!! Form::text('name', null, ['id' => 'name']) !!}
        </label>
        <br />
         <select name="group">
          <option value="">Izvēlieties Grupu!</option>
            @foreach($groups as $key => $value)

              <option value="{{ $value->id }}">{{ $value->Group_name }}</option>

             @endforeach
         </select> 
         <br />

        <label for="desc">
            Apraksts<br />
            {!! Form::textarea('desc', null, ['id' => 'desc']) !!}
        </label>
        <br />
        {!! Form::submit('Pievienot Kategoriju') !!}

    </div>
   </div>

@endsection
@stop