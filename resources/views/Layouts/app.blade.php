<!DOCTYPE html>
<html>
<head>
	<title>@yield('title')</title>
	
</head>
<body>
	@include('sweetalert::alert')
	@include('Includes.nav')

	<div>
		@yield('content')
	</div>

</body>
</html>