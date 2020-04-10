<?php
/**
 *    @author Cesar Gerardo Guzman Lopez mail 88-8live.com.mx
 *   vista para rellenar los datos faltantes de perfil
 *   
 */
?>
@extends('layouts.app')
    @section('content')
    <form action="{{route('Usuario/Cambiar_ClavePost')}}" method="post">
		@csrf
		<p>Antigua contraseña	<input name="old_password" type="password"  required></p>
		<p>Contraseña nueva 	<input name="password" type="password" required></p>
		<p>Repite contraseña		<input name="password_confirmation" type="password" required></p>
		  {!! NoCaptcha::display() !!} 
		<button type="submit">Enviar</button>
	</form> 
	@endsection
@section('scripts')
@parent
 {!! NoCaptcha::renderJs() !!}
@endsection
    
