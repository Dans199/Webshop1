@extends('Admin.master')

@section('content')

  <div class="row">
  <div class="col-md-8 col-md-offset-2">



    			<h4 >Add new Product!</h4>

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

    {!! Form::open(array('url'=>'admin/Products/add','method'=>'POST', 'files'=>true)) !!}
        <label for="name">
            Product name<br />
            {!! Form::text('name', null, ['id' => 'name']) !!}
        </label>
        <br />
           Choose Category:<br>
         <select name="cat">
          <option value="">Choose category!</option>
            @foreach($Categories as $key => $value)

              <option value="{{ $value->id }}">{{ $value->name }}</option>

             @endforeach
         </select> 
         <br />

        <label for="desc">
            Description:<br />
            {!! Form::textarea('desc', null, ['id' => 'desc']) !!}
        </label>
        <br />
        <label for="desired_price">
           Price:<br />
            {!! Form::text('price', null, ['id' => 'price']) !!}
        </label>
        <br />

        <div class="control-group">
          <div class="controls">
            Choose image for product! <br/>
          {!! Form::file('image') !!}
          <br/>

        {!! Form::submit('Add Product') !!}

    </div>
   </div>
</div>
   </div>

@endsection
@stop