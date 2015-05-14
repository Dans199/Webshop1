@extends('Admin.master')

@section('content')

  <div class="row">
  <div class="col-md-8 col-md-offset-2">

              <h4 >Lietotāju informācija !</h4>

           Lietotāja Vārds:<strong>{{ $User->name }}</strong><br>
           Lietotāja Ē-pasts:<strong> {{$User->email}}</strong> <br>
           Vai lietotājs ir Adminis(1:ir|0:nav):<strong>{{ $User->isAdmin}}</strong> <br>

    			<h4 >Lietotāja admiņa tiesības!</h4>

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


    
    <select name="isAdmin">
                <option value="">Vai ir admins!</option>
                <option value="0">Nav Admins</option>
                <option value="1">Ir Admins</option>
    </select> 
    <br />
    <br />


    {!! Form::submit('Izmainīt admiņa tiesības') !!}

    </div>
   </div>

@endsection
@stop