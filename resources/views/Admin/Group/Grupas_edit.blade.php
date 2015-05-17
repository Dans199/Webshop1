@extends('Admin.master')

@section('content')

  <div class="row">
  <div class="col-md-8 col-md-offset-2">



          <h4 > Grupas izmaiņu veikšana!</h4>

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
        <label for="Group_name">
            Grupas Nosaukums<br />
            {!! Form::text('Group_name', $Group_name, ['id' => 'Group_name']) !!}
        </label>
        <br />
        <label for="Group_desc">
            Apraksts<br />
            {!! Form::textarea('Group_desc', $Group_desc, ['id' => 'Group_desc']) !!}
        </label>
        <br />  

          <img src="{{asset($image)}}"  style="width:150px;height:100px"  class="img-thumbnail"> 
          <br/>

        Izvēlies bildi!<br />
        {!! Form::file('image') !!}<br />

        {!! Form::submit('Izmainīt grupu') !!}

    </div>
   </div>

@endsection
@stop