@extends ('app')

@section('content')
  <div class="row">
  <div class="col-md-8 col-md-offset-2" style="border-right: thick double #98bf21;border-left: thick double #98bf21;">

<!--     <pre>{{print_r($cart)}}</pre> -->

<h3 >Order :</h3>

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

@if($total>0)

<form class="form-horizontal" role="form" method="POST" action="{{ URL::route('cart-order-post') }}">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">

           <div class="form-group">
              <label class="col-md-4 control-label">Name, Surname</label>
              <div class="col-md-6">
                <input type="text" class="form-control" name="name">
              </div>
            </div>

            <div class="form-group">
              <label class="col-md-4 control-label">Address</label>
              <div class="col-md-6">
                <input type="text" class="form-control" name="address">
              </div>
            </div>

            <div class="form-group">
              <label class="col-md-4 control-label">Postal index</label>
              <div class="col-md-6">
                <input type="text" class="form-control" name="p_index">
              </div>
            </div>   

            <div class="form-group">
              <label class="col-md-4 control-label">Phone number</label>
              <div class="col-md-6">
                <input type="text" class="form-control" name="tel">
              </div>
            </div>   

           <h4> Ordered products: </h4>        

    <?php foreach($cart as $row) :?>



<div class="panel panel-primary">
  <div class="panel-body">
  <?php echo $row->name;?> 
  </div>
  <div class="panel-footer"> Quantity: <strong><?php echo $row->qty;?> </strong>
       Price per unit:
    <strong>  €<?php echo $row->price;?></strong>
    
  </div>
</div>
<br>

    
    <?php endforeach;?>


        <div class="form-group">
              <div class="col-md-6 col-md-offset-4">
                <button type="submit" class="btn btn-primary">
                Order
                </button>
              </div>
            </div>

</div>
</div>
@else

Shoping cart is  empty!!!!!!
To insert products, go to  section - &gt; <a href="{{ URL::route('veikals') }}">Shop!</a> .

@endif
@stop