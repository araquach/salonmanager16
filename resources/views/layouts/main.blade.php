<!doctype html>

<html>

@section('head')

@show

<body>

<div container>

	<header>
		<div id="logo"><a href="{{ url('/') }}"><h1>Salon Manager</h1></a></div>

		<ul class="list--inline">
        	<li><a href="{{ url('/home') }}">Home</a></li>
        	<li><a href="{{ url('/holiday') }}">Holidays</a></li>
        </ul>
	</header>
	
	
		@yield('content')
	
	<footer>
			<ul class="list--inline">
				<li><a href="{{ url('/') }}">Home</li>
				@if (Auth::guest())
					<li><a href="{{ url('/login') }}">Login</a></li>
                    <li><a href="{{ url('/register') }}">Register</a></li>
                @else 
				<li><a href="{{ url('/logout') }}">Logout</a></li>
				@endif
			</ul>
	</footer>
	

</div><!-- page -->

</body>
</html>
