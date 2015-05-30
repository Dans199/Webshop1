@extends('Admin.master')

@section('content')
  <div class="row">
  <div class="col-md-8 col-md-offset-2" >

   <h1>Welcome admin!</h1>

   <strong>Current user count:</strong>:{{$CurrentUserCount}}

 <h3>Last five orders!</h3>
 @if (!$Last5orders->isempty())
			
		<table class="table table-striped table-bordered">
    <thead>
        <tr>
        	<td>ID</td>
            <td>Client Name</td>
            <td>Address</td>
            <td>Postal index</td>
            <td>Phone number</td>
            <td>User ID</td>
            <td>Updated</td>
            <td>Options</td>

        </tr>
    </thead>
    <tbody>
    @foreach($Last5orders as $key => $value)
        <tr>
            <td>{{ $value->id }}</td>
            <td>{{ $value->name}}</td>
            <td>{{ $value->address}}</td>
            <td>{{ $value->p_index}}</td>
            <td>{{ $value->tel}}</td>
            <td>{{ $value->user_id}}</td>
            <td>{{ $value->updated_at }}</td>
            <td><a class=" glyphicon glyphicon-remove" href="{{ URL::route('Admin-Orders-delete',$value->id) }}">
             &nbsp <a class="glyphicon glyphicon-pencil" href="{{ URL::route('Admin-Orders-edit',$value->id) }}">
                        &nbsp <a class="glyphicon glyphicon-folder-open" href="{{ URL::route('Admin-Orders-Items',$value->id) }}">
         </td>

       
        </tr>

    @endforeach
    </tbody>
</table>
@else
No orders in database!
@endif
		
    </div>
   </div>
   




@endsection
@stop