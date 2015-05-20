@extends('Admin.master')

@section('content')

  <div class="row">
  <div class="col-md-8 col-md-offset-2">



          <h4 > Galerijas izmaiņu veikšana!</h4>
                <h5> {{ $Products->title }} </h5>


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

                    <img src="{{asset($Image_Product->image)}}"  style="width:150px;height:100px"  class="img-thumbnail"> 
          <br/>

    {!! Form::open(['files' => true])!!}
        
        Izvēlies bildi!<br />
        {!! Form::file('image') !!}<br />

        {!! Form::submit('Izmainīt bildi') !!}

    </div>
   </div>

@endsection
@stop