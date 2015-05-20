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
       Produkts pievienots Grozam!
      </div>
      <!-- dialog buttons -->
      <div class="modal-footer">  <button style="float:left" type="button" class="btn btn-info btn-sm"  data-dismiss="modal">Turpināt iepirkties!</button><a class="btn btn-success btn-sm" href="/cart">Doties uz iepirkuma grozu !</a></div>
    </div>
  </div>
</div>

  <div class="row">
  <div class="col-md-8 col-md-offset-2">


	@if(Session::has('success'))
		<div class="alert alert-success">{{ Session::get('success') }}</div>
	@elseif (Session::has('fail'))
		<div class="alert alert-danger">{{ Session::get('fail') }}</div>
	@endif


<h3>Produkta Informācija!</h3>
  <div class="clearfix">
    <ol class="breadcrumb pull-left">
      <li><a href="{{ URL::route('veikals') }}">Veikals</a></li>
      <li><a href="{{ URL::route('shop-category',$group->id) }}">{{$group->Group_name}} </a></li>
      <li><a href="{{ URL::route('shop-product',$category->id) }}">{{$category->name}} </a></li>
      <li class="active">{{ $product->title }}</li>
    </ol>
  </div>

  <div>

   <img src="{{asset($Image_Product->image)}}" alt="{{$Image_Product->id}}"  width="300" height="100"  class="img-thumbnail"> 
<div>
 <div>
    <h4><strong>Preces Nosaukums:</strong> {{ $product->title }}</h4>
      <div>
     <strong>Apraksts:</strong> <br>
     {{ $product->description }}
 </div>
  </div>

<div >
    <strong>Cena: </strong>
    € {{ $product->price }} 
    <br>  <br>
    @if (!Auth::guest())
     <button type="button" id="{{$product->id}}"  class="swag btn btn-success btn-sm">Pievienot Grozam!</button>
     @else
     Lai iepirktos jums nepieciešams autorizēties!
        <a href="/auth/login">autorizēties!</a>
            <a href="/auth/register">Reģistrēties!</a></li>
     @endif
  </div>

  </div>
</div>
			

  
@stop