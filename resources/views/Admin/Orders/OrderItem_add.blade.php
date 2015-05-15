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



    			<h4 >Pievienot Produktus !</h4>

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

   {!! Form::open() !!}
    <div style="  width: 700px;float:left;">


               Izvēlieties Grupu: <br>
             <select name="Group" id="Group" style="width:170px;">
          <option value="">Izvēlieties Grupu!</option>
          @foreach($Group as $key => $value)
         
              <option value="{{ $value->id }}" onclick="loadProducts( $value->id')" >{{ $value->Group_name }}</option>
               @endforeach

         </select> 
         <br /><br />

          Izvēlieties Kategoriju:<br />
        <select name="categories" id="categories" style="width:170px;">
          <option value="">Izvēlieties Kategoriju!</option>
              <option value="{{ $value->id }}" onclick="loadProducts( $value->id')" >{{ $value->name }}</option>
         </select> 
         <br /><br />
  
              Izvēlieties Produktu:<br />
        <select name="products" id="products" style="width:170px;">
          <option value="">Izvēlieties Produktu!</option>
     
         </select> 
         <br /><br />

           <label for="quantity">
            Preces Daudzums <br>
            {!! Form::text('quantity', null, ['id' => 'name']) !!}
        </label>
        <br /><br />


        <label for="order_id">
            
            {!! Form::hidden('order_id', $id, ['id' => 'order_id']) !!}
        </label>
        <br />


        {!! Form::submit('Pievienot Pasūtījumam produktu') !!}

    </div>
   </div>

@endsection
@stop