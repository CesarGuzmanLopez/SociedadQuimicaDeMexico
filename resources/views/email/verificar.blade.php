<!doctype html>
<html>
<head>
<meta charset="UTF-8">
<meta author="Cesar Gerardo Guzman Lopez">

<title>Verifica tu email SQM</title>
</head>
<body>
    <h1 style="color: gray;">Bienvenido <b> {{$name}} {{$Apellido}}</b> a la Sociedad Quimica de México.</h1>
	<p>Para verificar su correo por favor ingrese al siguiente vinculo</p>
	<b>
	<a href="{{url('Verificar').'/'.$Codigo_Confirmacion}}">
		Verificar
	</a>
	</b> 	 
<a href="{{url('Verificar').'/'.$Codigo_Confirmacion}}">	<p>{{url('Verificar').'/'.$Codigo_Confirmacion}}</p></a>
</body>
</html>