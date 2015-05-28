@extends('Admin.master')

@section('content')

  <div class="row">
  <div class="col-md-8 col-md-offset-2">



    			<h4 >Add new Product group!</h4>

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

    {!! Form::open(array('url'=>'admin/groups/add','method'=>'POST', 'files'=>true)) !!}
        <label for="Group_name">
            Group name:<br />
            {!! Form::text('Group_name', null, ['id' => 'Group_name']) !!}
        </label>
        <br />
        <label for="Group_desc">
            Description:<br />
            {!! Form::textarea('Group_desc', null, ['id' => 'Group_desc']) !!}
        </label>
        <br />

        <div class="control-group">
          <div class="controls">
             Choose image for group:<br />
          {!! Form::file('image') !!}<br />

             </div>
             </div>



        {!! Form::submit('Add group') !!}

    </div>
   </div>

@endsection
@stop