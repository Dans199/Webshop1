@extends('Admin.master')

@section('content')

  <div class="row">
  <div class="col-md-8 col-md-offset-2">



    			<h4 >Special edit!</h4>

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


   {!! Form::open(['files' => true])!!}
      
       Special name:<br />
        {!! Form::text('name', $name, ['id' => 'name']) !!}
        <br />
        
       Special ends at:<br />
        {!! Form::input('date','end_time' , $end_time, ['placeholder' => 'yyyy-mm-dd', 'id' => 'end_time']) !!}
 
        <br />
        <br />
         <img src="{{asset($image)}}"  style="width:150px;height:100px"  class="img-thumbnail"> 
          <br/>
            Choose image for special:<br />
        {!! Form::file('image') !!}<br />
        {!! Form::submit('Edit special ') !!}

    </div>
   </div>

@endsection
@stop