<!DOCTYPE html>
<html lang="en">
	<link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}" />
	<link rel="stylesheet" href="{{ asset('css/user-layout.css') }}" />
<body>

	<div id="fullscreen_bg" class="fullscreen_bg"/>
		
		@if(Auth::check())
			<nav> Navbar
			</nav>
		@endif

		<div class="container">

			@yield('content')

		</div>
	</div>
</body>
		<script src="//polyfill.io"></script>
</html>
