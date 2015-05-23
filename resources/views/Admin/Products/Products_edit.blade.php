@extends('Admin.master')

@section('content')

  <div class="row">
  <div class="col-md-8 col-md-offset-2">
    			<h4 >Product edit!</h4>

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

      {!! Form::open(['files' => true]) !!}
        <label for="name">
             Product name:<br />
            {!! Form::text('name', $name, ['id' => 'name']) !!}
        </label>
        <br />
         Choose Category:<br>
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
             Description:<br />
            {!! Form::textarea('desc', $desc, ['id' => 'desc']) !!}
        </label>
        <br />
        <label for="desired_price">
           Price:<br />
            {!! Form::text('price', $price, ['id' => 'price']) !!}
        </label>
        <br />
          <img src="{{asset($image)}}"  style="width:150px;height:100px"  class="img-thumbnail"> 
          <br/>

        Choose image for product! <br />
        {!! Form::file('image')!!}<br />

        {!! Form::submit('Edit Product') !!}

    </div>
   </div>

@endsection
@stop