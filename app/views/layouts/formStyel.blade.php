<!DOCTYPE html>
<html>
    <head>
      
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">

        <!-- CSS are placed here -->
        {{ HTML::style('css/bootstrap.css') }}
        {{ HTML::style('css/bootstrap-theme.css') }}
		{{ HTML::style('css/bootstrapValidator.min.css') }}
		
		<!-- Scripts are placed here -->
        {{ HTML::script('js/jquery-1.11.1.min.js') }}
        {{ HTML::script('js/bootstrap.min.js') }}
		{{ HTML::script('js/bootstrapValidator.min.js') }}  <!-- validation -->
		{{ HTML::script('js/jquery.tabletojson.min.js') }}  <!-- convert table to JSON -->
		
		
	@section('script')
    <!-- add script here-->
    @show
	<title>
         @yield('title')
     </title>
    </head>

    <body>
        <!-- Navbar -->
        <div class="navbar navbar-inverse navbar-fixed-top" role="navigation">	
			<div class="navbar-header">
				<a class="navbar-brand" rel="home" href="http://acnw.com.au">ACNW</a>
			</div>
			<div class="collapse navbar-collapse">	
				<ul class="nav navbar-nav">
				@yield('navigation')				
				</ul>
			<div class="col-sm-3 col-md-3 pull-right">		
				<ul class="nav navbar-nav navbar-right">
				<li><a href="#">Contact</a></li>
				<li><a href="logout">Logout</a></li>
				</ul>
			</div>		
			</div>
		</div>
		<!-- /.navbar -->
		
		<!-- HEADER -->
		<div class="jumbotron text-center">
			<div class="container">
				<div class="row">
					<div class="col col-lg-12 col-sm-12">
					@yield('jumbotron')			
					</div>
				</div>
			</div> 
		</div>
		<!--/.HEADER -->
		
        <!-- Container -->
        <div class="container">		
		
		   @yield('content')
			
        </div>
		<!-- /.Container -->
		
		<!-- Footer -->
  	    <div class="footer">
		<div class="container">
      
			<div class="notice pull-left">
			<p class="navbar-text text-muted">Copyright@2014</p>
			<p class="navbar-text text-muted">Feedback</p>
		</div>
		</div>
		</div> 
		<!--/footer -->  
	


    </body>
</html>