@extends ('app')

@section ('content')

<script>

$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});

$( document ).ready(function(){

      $(":button").click (function(){

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


<h3>Product Information!</h3>
  <div class="clearfix">
    <ol class="breadcrumb pull-left">
      <li><a href="{{ URL::route('veikals') }}">Shop</a></li>
      <li><a href="{{ URL::route('shop-category',$group->id) }}">{{$group->Group_name}} </a></li>
      <li><a href="{{ URL::route('shop-product',$category->id) }}">{{$category->name}} </a></li>
      <li class="active">{{ $product->title }}</li>
    </ol>
  </div>

  <div>

   <img src="{{asset($Image_Product->image)}}" alt="{{$Image_Product->id}}"  width="300" height="100"  class="img-thumbnail"> 
<div>
 <div>
    <h4><strong>Product name:</strong> {{ $product->title }}</h4>
      <div>
     <strong>Description:</strong> <br>
     {{ $product->description }}
 </div>
  </div>

<div >
    <strong>Price: </strong>
    € {{ $product->price }} 
    <br>  <br>
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
			

  
@stop