@extends('Admin.master')

@section('content')

  <div class="row">
  <div class="col-md-8 col-md-offset-2">



    			<h4 >Edit Order!</h4>

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

    {!! Form::open() !!}
    <div style="  width: 700px;float:left;">
        <label for="name">
           Client Name & surname<br />
            {!! Form::text('name', $name, ['id' => 'name']) !!}
        </label>
        <br />

        <label for="address">
          Address<br />
            {!! Form::text('address', $address, ['id' => 'address']) !!}
        </label>
        <br />

        <label for="p_index">
           Postal index<br />
            {!! Form::text('p_index', $p_index, ['id' => 'p_index']) !!}
        </label>
        <br />

        <label for="tel">
          Phone Number:<br />
            {!! Form::text('tel', $tel, ['id' => 'tel']) !!}
        </label>
        <br />
    

        {!! Form::submit('Edit Order') !!}

    </div>
   </div>
     </div>

@endsection
@stop