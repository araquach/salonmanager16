<head>
	
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="description" content="">
	<meta name="keywords" content="">
	<meta name="author" content="Salon Manager">
	
	<meta property="og:title" content="{{ $ogtitle or 'Salon Manager' }}">
    <meta property="og:description" content="{{ $ogdescription or '' }}">
	<meta property="og:image" content="{{ $ogimage or url('/') . '/images/ogimage/home.jpg' }}">
	<meta property="og:url" content="{{ url()->current() }}">
	
	
	<!--Google analytics -->


	<link rel="stylesheet" type="text/css" href="{{ elixir('css/app.css') }}" />

	<title>{{ $title or 'Salon Manager' }}</title>

</head>