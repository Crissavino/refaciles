<header class="">

	<nav class="navbar">
		<div class="redes-sociales">
			<ul class="">
				<li class=""> 
					<a class="" href="https://www.facebook.com/refaciles/" target="_blank" title="">
						<i class="fab fa-facebook-square fa-1x iconoNormal"></i>
						<i style="display:none" class="iconoMobile fab fa-facebook-square fa-2x"></i>
					</a> 
				</li>
				<li class=""> 
					<a class="" href="https://www.instagram.com/refaciles/?hl=es-la" target="_blank" title="">
						<i class="fab fa-instagram fa-1x iconoNormal"></i>
						<i style="display:none" class="iconoMobile fab fa-instagram fa-2x"></i>
					</a> 
				</li>
				<li class=""> 
					<a class="" href="https://ar.pinterest.com/refaciles/?eq=refaciles&etslf=4778" target="_blank" title="">
						<i class="fab fa-pinterest fa-1x iconoNormal"></i>
						<i style="display:none" class="iconoMobile fab fa-pinterest fa-2x"></i>
					</a> 
				</li>
			</ul>
		</div>

		<div class="menu">
			<ul class="">
				<li><a href="{{url('index')}}" title="">Inicio</a></li>
				<li><a href="{{url('recetas')}}" title="">Recetas</a></li>
				<li><a href="{{url('nosotros')}}" title="">Quienes somos?</a></li>
				<li><a href="{{url('contacto')}}" title="">Contacto</a></li>
			</ul>
		</div>
		@auth
			@if (auth()->user()->isAdmin === 1)
				<div class="registro">
					<ul class="">
						<li><a href="/curador" class="mr-3" title="">Cargar receta</a></li>
						<li><a href="/recetasTodas" class="mr-3" title="">Editar Receta</a></li>
						<li><a href="/logout" title="">Cerrar Sesión</a></li>
					</ul>
				</div>
			@else
				<div class="registro">
					<ul class="">
						<li><a href="/miperfil" class="mr-3" title="">Mi perfíl</a></li>
						<li><a href="/logout" title="">Cerrar Sesión</a></li>
					</ul>
				</div>
			@endif
		@else
			<div class="registro">
				<ul class="">
					<li><a href="/login" class="mr-3" title="">Iniciar Sesión</a></li>
					{{-- <li><a href="/register" title="">Registrarse</a></li> --}}
				</ul>
			</div>
		@endauth

		@auth
			<span class="mobile-btn"></span>
			<ul class="menu-mobile">
		  		<li><a href="/index">Inicio</a></li>
	            <li><a href="/recetas">Recetas</a></li>
	            <li><a href="/nosotros">Quienes somos?</a></li>
	            <li><a href="/contacto">Contacto</a></li>
	           	<li><a href="/miperfil" title="">Mi perfíl</a></li>
				<li><a href="/logout" title="">Cerrar Sesión</a></li>
			</ul>
		@else
			<span class="mobile-btn"></span>
			<ul class="menu-mobile">
		  		<li><a href="/index">Inicio</a></li>
	            <li><a href="/recetas">Recetas</a></li>
	            <li><a href="/nosotros">Quienes somos?</a></li>
	            <li><a href="/contacto">Contacto</a></li>
	           	<li><a href="/login" title="">Iniciar Sesión</a></li>
				{{-- <li><a href="/register" title="">Registrarse</a></li> --}}
			</ul>
		@endauth

        

		<div class="linea-doble"></div>
	</nav>
		{{-- <h1 class="font-logo" style="color: black;">Re Faciles</h1> --}}
	<a name="inicio"></a>

	<div class="refaciles">
		<h1 class="font-logo">Re Fáciles</h1>
		{{-- <div class="imagen-logo">
			<img src="/img/logo-refaciles.svg" alt="">
		</div> --}}
	</div>
</header>