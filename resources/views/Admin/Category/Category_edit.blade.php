@extends('Admin.master')

@section('content')

  <div class="row">
  <div class="col-md-8 col-md-offset-2">



    			<h4 >Edit category!</h4>

                @if (count($errors) > 0)
            <div class="alert alert-danger">
              <strong>Whoops!</strong> There were some problems with your input!<br><br>
              <ul>
                @foreach ($errors->all() as $error)
                  <li>{{ $error }}</li>
                @endforeach
              </ul>
            </div>
          @endif

   {!! Form::open(['files' => true])!!}
        <label for="name">
            Category name<br />
            {!! Form::text('name', $name, ['id' => 'name']) !!}
        </label>
        <br />

        Choose group:<br>
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
            Description:<br />
            {!! Form::textarea('desc', $desc, ['id' => 'desc']) !!}
        </label>
        <br />
         <img src="{{asset($image)}}"  style="width:150px;height:100px"  class="img-thumbnail"> 
          <br/>
            Choose image for category! <br/>
        {!! Form::file('image') !!}<br />
        {!! Form::submit('Edit category') !!}

    </div>
   </div>

@endsection
@stop