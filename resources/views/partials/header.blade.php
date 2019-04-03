<header class="">
	<nav class="navbar m-auto">
		{{-- <a class="navbar-brand logo" href="#">
			<img src="/img/logo.png" class="ml-4" width="130" height="130" alt="">
		</a> --}}
		<div class="redes-sociales col-2">
			<ul class="navbar-nav flex-row align-top">
				<li class="nav-item"> <a class="" href="https://www.facebook.com/refaciles/" target="_blank" title=""><i class="fab fa-facebook-square fa-1x"></i></a> </li>
				<li class="nav-item"> <a class="" href="https://www.instagram.com/refaciles/?hl=es-la" target="_blank" title=""><i class="fab fa-instagram fa-1x"></i></a> </li>
				<li class="nav-item"> <a class="" href="https://ar.pinterest.com/refaciles/?eq=refaciles&etslf=4778" target="_blank" title=""><i class="fab fa-pinterest fa-1x"></i></a> </li>
			</ul>
		</div>
		<div class="menu col-8">
			<ul class="navbar-nav flex-row justify-content-center">
				<li><a href="/index" title="">Home</a></li>
				<li><a href="/recetas" title="">Recetas</a></li>
				<li><a href="/nosotros" title="">Quienes somos</a></li>
				<li><a href="/contacto" title="">Contacto</a></li>
			</ul>
		</div>

		@auth
			<div class="col-2 registro">
				<ul class="navbar-nav flex-row justify-content-center">
					<li><a href="/miperfil" class="mr-3" title="">Mi perfíl</a></li>
					<li><a href="/logout" title="">Cerrar Sesión</a></li>
				</ul>
			</div>
		@else
			<div class="col-2 registro">
				<ul class="navbar-nav flex-row justify-content-center">
					<li><a href="/login" class="mr-3" title="">Iniciar Sesión</a></li>
					<li><a href="/register" title="">Registrarse</a></li>
				</ul>
			</div>
		@endauth
		<div class="linea-doble"></div>
	</nav>

	<div class="refaciles">
		<img src="/img/logo-refaciles.svg" alt="">
	</div>
</header>