{{--
<!--
    @author Cesar Gerardo Guzman Lopez mail 88-8live.com.mx 
    vista principal de la pagina web
 -->
--}}
@extends('layouts.app')
@section('content')
<form action="{{route('Registrar'}}" method="post">
	       @csrf
	       <div>Nombre *<input type="text" required name="naem"/></div>
	       <div>Apellido <input type="text"  name="Apellido" /></div>
	       <div>Nombre de Usuario <input type="text" name="Nombre_de_usuario" pattern="^@" minlength="4"></div>
	       <div>Password <input type="password" required minlength="4"> </div>
	       <div>repite la contraseña Password <input type="password" required minlength="4"> </div>
			
</form>
@endsection