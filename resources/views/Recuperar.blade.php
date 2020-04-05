<?php    
/**
    formulario para recuperar contraseña
    @author Cesar Gerardo Guzman Lopez mail 88-8live.com.mx 
*/
?>
@extends('layouts.app')
@if(!isset($Recuperar))
    @section('content')
    <form action="{{route('RecuperarPost')}}" method="post">
    	@csrf
            Correo o nombre de usuario
     	<input type="text" name="Usuario"  class="form-control" minlength="4" placeholder="'Correo' o 'nombre de usuario'"   required>
        {!! NoCaptcha::display() !!}  
     	<button type="submit">Enviar</button>
     </form>
    @endsection
    @section('scripts')
    @parent
    {!! NoCaptcha::renderJs() !!}
    @endsection
@else
@switch($Recuperar)
    @case('found')
   		@section('content')
    		Se ha enviado un codigo a tu correo
   		 @endsection
    @break
    @case('not_found')
   		@section('content')
    		No se encuentra el usuario
 	   @endsection
    @break 
    @case('Codigo')
    	@section("content")
    		Recuperar pass para:  {{$Nombre}} ({{$usuario}})
    		<form action="{{route('newpass')}}" method="post">
    			@csrf
    			<input type="hidden"  name="token" value="{{$token}}">
        		<div>Contraseña *<input type="password" required minlength="4" name="password"> </div>
    	       <div>Repite la contraseña * <input type="password" name="password_confirmation" required > </div>
                  @if ($errors->has('password_confirmation'))
                    <span class="help-block text-danger" role="alert">
                        <strong>{{ $errors->first('password_confirmation') }}</strong>
                    </span>	
                @endif
    			<div>
			<button type="submit">Enviar</button>
		</div>	
    		</form>
    		
    	@endsection
   	@break
@endswitch
@endif
