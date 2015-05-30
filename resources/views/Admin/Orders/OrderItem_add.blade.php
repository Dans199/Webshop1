@extends('Admin.master')


@section('content')


<script  >

$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});

$( document ).ready(function() {

      $("#categories").change(function(){
              $.post('/admin/Orders/items/products/'+ $(this).val(), function(response){
                console.log(response);
                  if(response.success)
                  {
                      var Products = $('#products').empty();

                         $('<option/>', {
                              value:"",
                              text:'Choose Product'
                          }).appendTo(Products);

                     
                      $.each(response.products, function(i, products){
                        console.log(i);
                          $('<option/>', {
                              value:products.id,
                              text:products.title
                          }).appendTo(Products);

                      })
                  }
              }, 'json');
      });

            $("#Group").change(function(){
       
              $.post('/admin/Orders/items/category/'+ $(this).val(), function(response){
                console.log(response);
                  if(response.success)
                  {
                      var Categories = $('#categories').empty();

                            $('<option/>', {
                              value:"",
                              text:'Choose Category'
                          }).appendTo(Categories);

                     
                      $.each(response.Category, function(i,Category){
                        console.log(i);
                          $('<option/>', {
                              value:Category.id,
                              text:Category.name
                          }).appendTo(Categories);

                      })
                  }
              }, 'json');
      });



});



</script>

  <div class="row">
  <div class="col-md-8 col-md-offset-2">



    			<h4 >Add product to order !</h4>

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


               Choose Group: <br>
             <select name="Group" id="Group" style="width:170px;">
          <option value="">Choose Group!</option>
          @foreach($Group as $key => $value)
         
              <option value="{{ $value->id }}" onclick="loadProducts( $value->id')" >{{ $value->Group_name }}</option>
               @endforeach

         </select> 
         <br /><br />

          Choose Category:<br />
        <select name="categories" id="categories" style="width:170px;">
          <option value="">Choose Category!</option>
              <option value="{{ $value->id }}" onclick="loadProducts( $value->id')" >{{ $value->name }}</option>
         </select> 
         <br /><br />
  
              Choose Product:<br />
        <select name="products" id="products" style="width:170px;">
          <option value=""> Choose Product!</option>
     
         </select> 
         <br /><br />

           <label for="quantity">
            Quantity <br>
            {!! Form::text('quantity', null, ['id' => 'name']) !!}
        </label>
        <br /><br />


        <label for="order_id">
            
            {!! Form::hidden('order_id', $id, ['id' => 'order_id']) !!}
        </label>
        <br />


        {!! Form::submit('Add product') !!}

    </div>
   </div>
   </div>

@endsection
@stop