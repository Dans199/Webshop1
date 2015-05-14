@extends('Admin.master')

<script>

        function loadProducts(cv){

          var url="/admin/Orders/items/products";
          $.post(url,{contentVar: cv}, function (data){
              $(".Products").html(data);
          });
        }
</script>

@section('content')

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



        <select name="cat">
          <option value="">Izvēlieties Kategoriju!</option>
            @foreach($Categories as $key => $value)

              <option value="{{ $value->id }}" onclick="loadProducts( $value->id')" >{{ $value->name }}</option>

             @endforeach
         </select> 
         <br />
             <br />

        <select name="Products" cla>
          <option value="">Izvēlieties Produktu!</option>
     
         </select> 
         <br />

           <label for="quantity">
            Preces Daudzums <br>
            {!! Form::text('quantity', null, ['id' => 'name']) !!}
        </label>
        <br />


        <label for="order_id">
            
            {!! Form::hidden('order_id', $id, ['id' => 'order_id']) !!}
        </label>
        <br />


        {!! Form::submit('Pievienot Pasūtījumu') !!}

    </div>
   </div>

@endsection
@stop