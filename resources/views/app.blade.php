<!DOCTYPE html>
<html>
<head>
	@include('partials.head')
	<title>@yield('title') - ReFaciles</title>
</head>
<body>
	<section class="conteiner">
		@include('partials.header')

		<main class="container-fluid">
			@yield('main')
		</main>
		@include('partials.footer')

	</section>
</body>
</html>