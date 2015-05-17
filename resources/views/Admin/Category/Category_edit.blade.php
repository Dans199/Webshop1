@extends('Admin.master')

@section('content')

  <div class="row">
  <div class="col-md-8 col-md-offset-2">



    			<h4 >Kategorijas izmaiņas!</h4>

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
        <label for="name">
            Kategorijas Nosaukums<br />
            {!! Form::text('name', $name, ['id' => 'name']) !!}
        </label>
        <br />
         <select name="group">
        
            @foreach($groups as $key => $value)
            @if($value->id==$group)

              <option value="{{ $value->id }}" selected="selected">{{ $value->Group_name }}</option>

              @else

               <option value="{{ $value->id }}">{{ $value->Group_name }}</option>

              @endif


             @endforeach
         </select> 
         <br />

        <label for="desc">
            Apraksts<br />
            {!! Form::textarea('desc', $desc, ['id' => 'desc']) !!}
        </label>
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