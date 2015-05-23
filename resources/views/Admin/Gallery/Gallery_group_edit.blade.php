@extends('Admin.master')

@section('content')

  <div class="row">
  <div class="col-md-8 col-md-offset-2">



          <h4 >Edit group image!</h4>
           <h5><strong>Group name:</strong>{{$group->Group_name}}</h5>


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

                    <img src="{{asset($Image_groups->image)}}"  style="width:150px;height:100px"  class="img-thumbnail"> 
          <br/>

    {!! Form::open(['files' => true])!!}
        



    

         Choose Image!<br />
        {!! Form::file('image') !!}<br />

         {!! Form::submit('Edit image') !!}

    </div>
   </div>

@endsection
@stop