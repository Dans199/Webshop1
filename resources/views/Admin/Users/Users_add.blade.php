@extends('Admin.master')

@section('content')

  <div class="row">
  <div class="col-md-8 col-md-offset-2">



    			<h4 >Jaunas Lietotāja Pievienošana!</h4>

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

    <label for="email">
      Ē-pasts<br />
      {!! Form::text('email', null, ['id' => 'email']) !!}
    </label>
    <br />

    <label for="name">
      Vārds<br />
      {!! Form::text('name', null, ['id' => 'name']) !!}
    </label>
    <br />

    <label for="password">
      Parole<br />
      {!! Form::password('password', ['id' => 'password']) !!}
    </label>
    <br />

    <label for="password_confirmation">
      Apstiprināt paroli<br />
      {!! Form::password('password_confirmation', ['id' => 'password_confirmation']) !!}
    </label>
    <br />

    <select name="isAdmin">
                <option value="">Vai ir admins!</option>
                <option value="0">Nav Admins</option>
                <option value="1">Ir Admins</option>
    </select> 
    <br />
    <br />


    {!! Form::submit('Pievienot Lietotāju') !!}

    </div>
   </div>

@endsection
@stop