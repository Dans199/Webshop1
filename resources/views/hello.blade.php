@extends ('app')

@section ('content')

	@if(Session::has('success'))
		<div class="alert alert-success">{{ Session::get('success') }}</div>
	@elseif (Session::has('fail'))
		<div class="alert alert-danger">{{ Session::get('fail') }}</div>
	@endif

<div class="container-fluid">
  <div class="row">
    <div class="col-md-10 col-md-offset-1">

  <div  style="padding: 10px 10px;float:left;width:auto;margin: 10px;border-right: thick double #98bf21;border-left: thick double #98bf21;">

     <h2>Hot offerings</h2>
     <br>
  

          
        @foreach($Specials as $Special)
        @if($Special->end_time >=$currentTime)

<div class="panel panel-default" style="width:350px;height: 420px;  border-width: 2px;margin: 10px;">
  <div class="panel-heading" >{{ $Special->name }}</div>
  <div class="panel-body col-lg-1 col-centered">
      @foreach($images_Specials as $images_Special)
      @if($Special->id == $images_Special->special_id)
      <div>
       <img src="{{asset($images_Special->image)}}" alt="{{$images_Special->id}}" style="width:300px;height:300px"  > 
     </div>
      @endif
      @endforeach
      <div style="width:320px;">
  <h4>Hot offer ends: <strong>{{ $Special->end_time }}</strong><h4>
  </div>
</div></div>
<br>
      @endif

      @endforeach
      
 </div>


  <div  style="padding: 10px 10px;float:left;width:auto;border-right: thick double #98bf21;">
      <h2>Information about the company.</h2>
      <br/>

            <img width="460" height="215" src="upload/2.jpg" alt="Pro gaming pic"> 

     <h2>Welcome to the online shop TSG !</h2>
     <br>
      <p>We can offer all types of computer goods at bargain prices. </p>
      <br>

      <br> 
      <br>
      <h4> Cheap gaming computer can be put together by any of us:)</h4><br>
        <iframe width="460" height="215" src="https://www.youtube.com/embed/rQtUWjgxrd8" frameborder="0" allowfullscreen></iframe>
      <p>This web page was created by Dans Grīnšteins (dg13030). :) !!!</p>

</div>
</div>
</div>
</div>





  
@stop