@extends ('app')

@section('content')
  <div class="row">
  <div class="col-md-8 col-md-offset-2" style="border-right: thick double #98bf21;border-left: thick double #98bf21;">

<!--     <pre>{{print_r($cart)}}</pre> -->

<h3 >Your shopping Cart:</h3>

@if($total>0)

<table class="table table-bordered" >
    <thead>
        <tr>
            <th>Products</th>
            <th>Quantity</th>
            <th>Price</th>
            <th>Total price</th>
            <th>Delete</th>
        </tr>
    </thead>

    <tbody>

    <?php foreach($cart as $row) :?>

        <tr>
            <td>
                <p><strong><?php echo $row->name;?></strong></p>
                <p><?php echo ($row->options->has('size') ? $row->options->size : '');?></p>
            </td>
            <td><?php echo $row->qty;?></td>
            <td>€<?php echo $row->price;?></td>
            <td>€<?php echo $row->subtotal;?></td>
             <td><a type="button" href="{{ URL::route('delete-cart', $row->rowid )}}" class="btn btn-danger btn-xs">Delete</a></td>
       </tr>

    <?php endforeach;?>

    </tbody>
</table>



<div style="float:left;">

 Total order price:<strong>€{{$total}}</strong> 
  </div>
  <br>
   <div  style="display: block; margin-left:auto; margin-right:auto;">
  <a type="button" href="{{ URL::route('cart-order' )}}" style="width:160px;" class="btn btn-primary btn-lg ">Order</a>
</div>
</div>
</div>
@else

Shoping cart is  empty!!!!!!
To insert products, go to  section - &gt; <a href="{{ URL::route('veikals') }}">Shop!</a> .
@endif
@stop