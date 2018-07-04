<!DOCTYPE html>
<html>
<head>
	<title>Dental</title>
	@include('layouts.admin.template.head')
</head>
<body>
	@include('layouts.admin.template.navigation')
	
		@yield('content')

	@include('layouts.admin.template.footer')

</body>
	@include('layouts.admin.template.script')
</html>