<!doctype html>
<html>
<head>
<meta charset="UTF-8">
<meta author="César Gerardo Guzmán López">

<title>Link para recuperar password</title>
</head>
<body>
<h1 style="color: gray;">Sociedad Quimica de México</h1>
	<p>Siga el siguiente link para recuperar la contaseña</p>
		@if($Nombre)
		<p>Nombre de usuario: {{$Nombre}}</p>
		<p>email: {{$email}}</p>
		@endif 
	<b><a href="{{url('Recuperar').'/'.$Codigo_Confirmacion}}">
		Reset password
	</a></b> 	 	
<a href="{{url('Recuperar').'/'.$Codigo_Confirmacion}}">	<p>{{url('Verificar').'/'.$Codigo_Confirmacion}}</p></a>
</body>
</html>