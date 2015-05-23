@extends('Admin.master')

@section('content')

  <div class="row">
  <div class="col-md-8 col-md-offset-2">



    			<h4 >Add new User!</h4>

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

    <label for="email">
      E-mail<br />
      {!! Form::text('email', null, ['id' => 'email']) !!}
    </label>
    <br />

    <label for="name">
      Name<br />
      {!! Form::text('name', null, ['id' => 'name']) !!}
    </label>
    <br />

    <label for="password">
      Password<br />
      {!! Form::password('password', ['id' => 'password']) !!}
    </label>
    <br />

    <label for="password_confirmation">
      Confirm Password<br />
      {!! Form::password('password_confirmation', ['id' => 'password_confirmation']) !!}
    </label>
    <br />

    <select name="isAdmin">
                <option value="">Set admin priviliges!</option>
                <option value="0">Is Admins</option>
                <option value="1">Isn't Admins</option>
    </select> 
    <br />
    <br />


    {!! Form::submit('Add user') !!}

    </div>
   </div>

@endsection
@stop