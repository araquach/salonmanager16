<!DOCTYPE HTML>

<html class="no-js">

@section('head')

@show

<body>

<div>

	<header>
		<div id="logo"><a href="{{ url('/') }}"><h1>Salon Manager</h1></a></div>
	</header>
	
	@yield('content')
	
	<div class="group"></div>

	<footer>
	<div id="mainmenu">
		<nav class="group">
		{{-- add jquery active --}}
			<ul>
				<li>{{ HTML::link('/', "Home") }}</li>
				<li>{{ HTML::link('admin', "Admin") }}</li>
				@if(!Auth::id())
					<li>{{ HTML::link('login', "Log in") }}</li>
				@endif
				@if(Auth::id())
					<li><a href="{{ url('logout') }}">Log out {{ Auth::user()->username }}</a></li>
				@endif
				
			</ul>
		</nav>
	</div>
	</footer>
	

</div><!-- page -->

</body>
</html>
