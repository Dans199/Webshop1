@extends('Admin.master')

@section('content')

  <div class="row">
  <div class="col-md-8 col-md-offset-2">

              <h4 >User information</h4>

           User name:<strong>{{ $User->name }}</strong><br>
           User E-mail:<strong> {{$User->email}}</strong> <br>
           Is user Admin(1:is|0:isn't):<strong>{{ $User->isAdmin}}</strong> <br>

    			<h4 >Edit user admin privileges!</h4>

                @if (count($errors) > 0)
            <div class="alert alert-danger">
              <strong>Whoops!</strong> There were some problems with your input.<br><br>
              <ul>
                @foreach ($errors->all() as $error)
                  <li>{{ $error }}</li>
                @endforeach
              </ul>
            </div>
          @endif

  {!! Form::open() !!}


    
    <select name="isAdmin">
                <option value="">Set admin priviliges!</option>
                <option value="0">Is Admins</option>
                <option value="1">Isn't Admins</option>
    </select> 
    <br />
    <br />


    {!! Form::submit('Edit user admin privileges') !!}

    </div>
   </div>

@endsection
@stop