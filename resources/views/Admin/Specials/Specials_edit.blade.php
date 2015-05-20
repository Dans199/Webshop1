@extends('Admin.master')

@section('content')

  <div class="row">
  <div class="col-md-8 col-md-offset-2">



    			<h4 >Akcijas izmaiņas!</h4>

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


   {!! Form::open(['files' => true])!!}
      
        Akcijas Nosaukums<br />
        {!! Form::text('name', $name, ['id' => 'name']) !!}
        <br />
        
        Apraksts<br />
        {!! Form::input('date','end_time' , $end_time, ['placeholder' => 'yyyy-mm-dd', 'id' => 'end_time']) !!}
 
        <br />
        <br />
         <img src="{{asset($image)}}"  style="width:150px;height:100px"  class="img-thumbnail"> 
          <br/>
            Izvēlies bildi!<br />
        {!! Form::file('image') !!}<br />
        {!! Form::submit('Izmainīt Kategoriju') !!}

    </div>
   </div>

@endsection
@stop