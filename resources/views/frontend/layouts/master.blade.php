<!DOCTYPE html>
<html lang="zxx">
<head>
	@include('frontend.layouts.head')	
</head>
<body class="js">
	
	<div class="preloader">
		<div class="preloader-inner">
			<div class="preloader-icon">
				<span></span>
				<span></span>
			</div>
		</div>
	</div>
	
	@include('frontend.layouts.notification')
	
	@include('frontend.layouts.header')
	
	@yield('main-content')
	
	@include('frontend.layouts.footer')

</body>
</html>