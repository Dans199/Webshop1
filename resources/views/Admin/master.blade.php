<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="csrf-token" content="{{ csrf_token() }}" />
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Admin Panel</title>

	<link href="/css/app.css" rel="stylesheet">

		<!-- Scripts -->
	<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
	<script src="//cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.1/js/bootstrap.min.js"></script>



	<!-- Fonts -->
	<link href='//fonts.googleapis.com/css?family=Roboto:400,300' rel='stylesheet' type='text/css'>

	<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
	<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
	<!--[if lt IE 9]>
		<script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
		<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
	<![endif]-->
</head>

<body>
	<div id="container">
   <div id="header">


	<nav class="navbar navbar-inverse navbar-fixed-top" style="font-size: 150%">
		<div class="container-fluid">
			<div class="navbar-header">
				<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
					<span class="sr-only">Toggle Navigation</span>
				</button>
				<p class="navbar-brand" style="font-size: 125%">TSG|Admin</p>
			</div>

			<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
				<ul class="nav navbar-nav">
					<li><a href="{{ URL::route('Admin') }}">Admin Home</a></li>
					<li><a href="{{ URL::route('Admin-Specials') }}">Specials</a></li>
					<li><a href="{{ URL::route('Admin-grupas') }}">Groups</a></li>
					<li><a href="{{ URL::route('Admin-category') }}">Categories<br/></a></li>
					<li><a href="{{ URL::route('Admin-Products') }}">Products</a></li>
					<li><a href="{{ URL::route('Admin-Orders') }}">Orders</a></li>
					<li><a href="{{ URL::route('Admin-gallery') }}">Galleries</a></li>
					<li><a href="{{ URL::route('Admin-Users') }}">Users</a></li>

				</ul>

				<ul class="nav navbar-nav navbar-right">
		
						<li class="dropdown">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">{{ Auth::user()->name }} <span class="caret"></span></a>
							
							<ul class="dropdown-menu" role="menu">
								<li><a href="/auth/logout">Logout</a></li>
								<li><a href="{{ URL::route('Main') }}">Home page</a></li>
						
							</ul>
						</li>
				
				</ul>
			</div>
		</div>
	</nav>
	<br/>	
<br>
<br>

   </div>

   <div id="body">
	@yield('content')

	</div>
	<br>
<br><br>
<br>
<br><br>
<br>
   <div id="footer">

   	<footer id="footer">
				<div class="container">
					<ul class="copyright">
						<li>&copy; TSG.dev</li>
						<li> This Admin panel was created by Dans Grīnšteins.</li>
						<li>Tel:+37126359851</li>
						<li>Fax: +371 7317029</li>
						<li> E-mail:info@tsg.lv</li>
					
					</ul>
				</div>
			</footer>

   </div>
</div>
</body>
		
</html>