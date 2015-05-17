@extends('Admin.master')

@section('content')

  <div class="row">
  <div class="col-md-8 col-md-offset-2">
    			<h4 >Produkta izmaiņas!</h4>

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

      {!! Form::open(['files' => true]) !!}
        <label for="name">
            Produkta Nosaukums<br />
            {!! Form::text('name', $name, ['id' => 'name']) !!}
        </label>
        <br />
        Izvelieties Kategoriju:<br>
         <select name="cat">
            @foreach($Categories as $key => $value)
            @if($value->id==$cat)

              <option value="{{ $value->id }}" selected="selected">{{ $value->name }}</option>

              @else

               <option value="{{ $value->id }}">{{ $value->name }}</option>

              @endif


             @endforeach
         </select> 
         <br />

        <label for="desc">
            Apraksts<br />
            {!! Form::textarea('desc', $desc, ['id' => 'desc']) !!}
        </label>
        <br />
        <label for="desired_price">
           Produkta Cena<br />
            {!! Form::text('price', $price, ['id' => 'price']) !!}
        </label>
        <br />
          <img src="{{asset($image)}}"  style="width:150px;height:100px"  class="img-thumbnail"> 
          <br/>

        Izvēlies bildi!<br />
        {!! Form::file('image')!!}<br />

        {!! Form::submit('Izmainīt grupu') !!}

    </div>
   </div>

@endsection
@stop