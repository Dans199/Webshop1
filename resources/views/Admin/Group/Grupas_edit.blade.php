@extends('Admin.master')

@section('content')

  <div class="row">
  <div class="col-md-8 col-md-offset-2">



          <h4 >Edit product group!</h4>

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
        <label for="Group_name">
           Group name:<br />
            {!! Form::text('Group_name', $Group_name, ['id' => 'Group_name']) !!}
        </label>
        <br />
        <label for="Group_desc">
             Description:<br />
            {!! Form::textarea('Group_desc', $Group_desc, ['id' => 'Group_desc']) !!}
        </label>
        <br />  

          <img src="{{asset($image)}}"  style="width:150px;height:100px"  class="img-thumbnail"> 
          <br/>

        Choose image for group:<br />
        {!! Form::file('image') !!}<br />

        {!! Form::submit('Edit group') !!}

    </div>
   </div>

@endsection
@stop