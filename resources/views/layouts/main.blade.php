<!doctype html>

<html>

@section('head')

@show

<body>

<div>

	<header>
		<div id="logo"><a href="{{ url('/') }}"><h1>Salon Manager</h1></a></div>

		<ul class="nav navbar-nav">
        	<li><a href="{{ url('/home') }}">Home</a></li>
        </ul>
	</header>
	
	@yield('content')
	
	<footer>
	<div id="mainmenu">
		<nav class="group">
			<ul>
				<li><a href="{{ url('/') }}">Home</li>
				@if (Auth::guest())
					<li><a href="{{ url('/login') }}">Login</a></li>
                    <li><a href="{{ url('/register') }}">Register</a></li>
                @else  
            		<li><a href="#">{{ Auth::user()->name }}</a></li>
				
					<li><a href="{{ url('/logout') }}">Logout</a></li>
				@endif
				
			</ul>
		</nav>
	</div>
	</footer>
	

</div><!-- page -->

</body>
</html>
