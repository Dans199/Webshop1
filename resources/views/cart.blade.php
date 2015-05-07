@extends ('app')

@section('content')
  <div class="row">
  <div class="col-md-8 col-md-offset-2">

<!--     <pre>{{print_r($cart)}}</pre> -->

<h3 >Jūsu iepirkuma grozs :</h3>

@if($total>0)

<table class="table table-bordered" >
    <thead>
        <tr>
            <th>Produkts</th>
            <th>Daudzums</th>
            <th>Cena</th>
            <th>Kopējā cena</th>
            <th>Izņemt</th>
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
             <td><a type="button" href="{{ URL::route('delete-cart', $row->rowid )}}" class="btn btn-danger btn-xs">Izņemt</a></td>
       </tr>

    <?php endforeach;?>

    </tbody>
</table>



<div style="float:left;">

  Kopējā iepirkuma summa:<strong>€{{$total}}</strong> 
  </div>
  <br>
   <div  style="display: block; margin-left:auto; margin-right:auto;">
  <a type="button" href="{{ URL::route('cart-order' )}}" style="width:160px;" class="btn btn-primary btn-lg ">Pasūtīt</a>
</div>
</div>
</div>
@else

 Iepirkuma grozs ir tukš!!!!!!
 Lai ievietotu produktus dodieties uz <a href="{{ URL::route('veikals') }}">Veikala</a> sadaļu.
@endif
@stop