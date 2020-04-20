<!doctype html>
<html lang="en">

<head>
	@include('layouts.head')
</head>

<body>


	<!--================Header Menu Area =================-->
	@include('layouts.header')
	<!--================Header Menu Area =================-->

    @yield('content')

	<!--================ Start Footer Area  =================-->
    @include('layouts.footer')
</body>

</html>
