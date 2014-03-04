 <!DOCTYPE html>
<html> 
<head>
	<!-- Meta -->
	<meta http-equiv="content-type" content="text/html;charset=UTF-8" />
	<meta charset="utf-8" />
	<title>Custommade</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
	<meta content="" name="description" />
	<meta content="" name="author" />
	
	@yield('head')
	<base href="{{URL::to('/')}}" />
</head>
<body @yield('body_attr')>
	@yield('body')
	@yield('scripts')
</body>
</html>
<!--
=====================================================
Dream Builder Solutions

Developers:
		   Arnel T. Lenteria
		   Vincent Rey Bengcolita
=====================================================
--> 