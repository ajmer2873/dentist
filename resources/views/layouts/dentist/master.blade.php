<!DOCTYPE html>
<html>
	<head>
		<title></title>
		@include('layouts.dentist.template.head')
	</head>
	<body>
		@include('layouts.dentist.template.navigation')

		@yield('content')

		@include('layouts.dentist.template.footer')

	</body>
		@include('layouts.dentist.template.script')
</html>