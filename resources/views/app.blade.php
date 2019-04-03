<!DOCTYPE html>
<html>
<head>
	@include('partials.head')
	<title>Re Faciles - @yield('title')</title>
</head>
<body>
	<section class="conteiner">
		{{-- @include('partials.header') --}}
		<div class="imprimible"></div>

		<main class="container-fluid">
			@yield('main')
		</main>
		<div class="imprimible"></div>
		{{-- @include('partials.footer') --}}

	</section>

	<script src="/js/menu-movil.js"></script>

	{{-- scripts para firebase --}}
		{{-- <script src="https://www.gstatic.com/firebasejs/5.7.0/firebase.js"></script>
		<script>
		  // Initialize Firebase
		  var config = {
		    apiKey: "AIzaSyCtooiYnKbC-QS6wj1pJKMX2cV07AQaipc",
		    authDomain: "refaciles-fb851.firebaseapp.com",
		    databaseURL: "https://refaciles-fb851.firebaseio.com",
		    projectId: "refaciles-fb851",
		    storageBucket: "refaciles-fb851.appspot.com",
		    messagingSenderId: "942241604345"
		  };
		  firebase.initializeApp(config);
		</script> --}}
	{{-- hasta aca --}}
</body>
</html>