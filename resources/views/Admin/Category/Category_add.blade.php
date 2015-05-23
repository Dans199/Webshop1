@extends('Admin.master')

@section('content')

  <div class="row">
  <div class="col-md-8 col-md-offset-2">



    			<h4 >Add new category!</h4>

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

    {!! Form::open(array('url'=>'admin/Categories/add','method'=>'POST', 'files'=>true)) !!}
        <label for="name">
            Category name<br />
            {!! Form::text('name', null, ['id' => 'name']) !!}
        </label>
        <br />
         <select name="group">
          <option value="">Choose group!</option>
            @foreach($groups as $key => $value)

              <option value="{{ $value->id }}">{{ $value->Group_name }}</option>

             @endforeach
         </select> 
         <br />

        <label for="desc">
            Description:<br />
            {!! Form::textarea('desc', null, ['id' => 'desc']) !!}
        </label>
        <br />

        <div class="control-group">
          <div class="controls">
            Choose image for category! <br/>
          {!! Form::file('image') !!}
          <br/>

             </div>
             </div>
        {!! Form::submit('Add category!') !!}

    </div>
   </div>

@endsection
@stop