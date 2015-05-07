@extends('Admin.master')

@section('content')

  <div class="row">
  <div class="col-md-8 col-md-offset-2">



    			<h4 >Jaunas grupas Pievienošana!</h4>

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
        <label for="Group_name">
            Grupas Nosaukums<br />
            {!! Form::text('Group_name', null, ['id' => 'Group_name']) !!}
        </label>
        <br />
        <label for="Group_desc">
            Apraksts<br />
            {!! Form::textarea('Group_desc', null, ['id' => 'Group_desc']) !!}
        </label>
        <br />
        {!! Form::submit('Pievienot grupu') !!}

    </div>
   </div>

@endsection
@stop