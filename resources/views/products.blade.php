@extends ('app')

@section ('content')

<style type="text/css">
  .bs-example{
    margin: 20px;
  }
  </style>

<script  >

$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});


$( document ).ready(function(){

      $(".swag").click (function(){


              $.post('/cart/Add/'+ $(this).attr('id'), function(response){

                console.log(response);
                  if(response.success)
                  {

                    $("#myModal").on("show", function() {    // wire up the OK button to dismiss the modal when shown
                    $("#myModal a.btn").on("click", function(e) {
                        $("#myModal").modal('hide');     // dismiss the dialog
                       });
                     });

                      $("#myModal").on("hide", function() {    // remove the event listeners when the dialog is dismissed
                          $("#myModal a.btn").off("click");
                      });
                      
                      $("#myModal").on("hidden", function() {  // remove the actual elements from the DOM when fully hidden
                          $("#myModal").remove();
                      });
                      
                      $("#myModal").modal({                    // wire up the actual modal functionality and show the dialog
                        "backdrop"  : "static",
                        "keyboard"  : true,
                        "show"      : true                     // ensure the modal is shown immediately
                      });


                }
              }, 'json');
      });
});





</script>

  <div id="myModal" class="modal fade">
  <div class="modal-dialog">
    <div class="modal-content">
      <!-- dialog body -->
      <div class="modal-body">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
       The product is added to the basket.
      </div>
      <!-- dialog buttons -->
      <div class="modal-footer">  <button style="float:left" type="button" class="btn btn-info btn-sm"  data-dismiss="modal">Continue shopping!</button><a class="btn btn-success btn-sm" href="/cart">Shopping Cart</a></div>
    </div>
  </div>
</div>

  <div class="row">
  <div class="col-md-8 col-md-offset-2" style="border-right: thick double #98bf21;border-left: thick double #98bf21;">




	@if(Session::has('success'))
		<div class="alert alert-success">{{ Session::get('success') }}</div>
	@elseif (Session::has('fail'))
		<div class="alert alert-danger">{{ Session::get('fail') }}</div>
	@endif
  <h4>Products</h4>

  <div class="clearfix">
    <ol class="breadcrumb pull-left">
      <li><a href="{{ URL::route('veikals') }}">Shop</a></li>
      <li><a href="{{ URL::route('shop-category',$group->id) }}">{{$group->Group_name}} </a></li>
      <li class="active">{{$category->name}}</li>

    </ol>
  </div>
  


    		@foreach($products as $product)

<div class="panel panel-default" style="width:800px;height: 230px; border-width: 2px;margin: 10px;">
  <div class="panel-heading" ><a href="{{ URL::route('product-info', $product->id) }}">{{ $product->title }}</a></li></div>
  <div class="panel-body col-lg-1 col-centered">

       @foreach($Image_Products as $Image_Product)
      @if($product->id == $Image_Product->product_id)
      <div style="Float:left;">
       <a href="{{ URL::route('product-info', $product->id) }}"><img src="{{asset($Image_Product->image)}}" alt="{{$Image_Product->id}}" style="width:160px;height:100px;border-width: 2px;margin: 10px;" > </a>
     </div>
      @endif
      @endforeach

      <div style="width:650px;">

       Description:
     <p  style="border-width: 2px;margin: 10px;" >{{ $product->description }}<p>
     </div>

     



  
  
   <div style="float:left;width:400px;">
    Price:
    <strong>{{ $product->price }}</strong> 
    @if (!Auth::guest())
     <button type="button" id="{{$product->id}}"  class="swag btn btn-success btn-sm">Add to cart!</button>
     @else
    You have to be loged in to add items to cart!
        <a href="/auth/login">Log in!</a>
            <a href="/auth/register">Register!</a></li>
     @endif
  </div>
  </div>
</div>
<br>

			@endforeach
			
    </div>
   </div>

  
@stop