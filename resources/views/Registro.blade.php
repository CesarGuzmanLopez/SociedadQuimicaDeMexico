<?php
/**
*    @author Cesar Gerardo Guzman Lopez mail 88-8live.com.mx 
*    Vista del formulario de registro
*/
?>
@extends('layouts.app')
@section('content')
<form action="{{route('Registrar')}}" method="post">
	       @csrf
	       <div>Nombre(s)*<input type="text" required name="name"value="{{old('name')}}"/></div>
	           @if ($errors->has('name'))
                <span class="help-block text-danger" role="alert">
                    <strong>{{ $errors->first('name') }}</strong>
                </span>
            @endif
	       <div>Apellido(s) <input type="text"  name="Apellido"  value="{{old('Apellido')}}"/></div> 
	       <div>Correo* <input type="email" name="email" value="{{old('email')}}"></div>
	           @if ($errors->has('email'))
                <span class="help-block text-danger" role="alert">
                    <strong>{{ $errors->first('email') }}</strong>
                </span>
            @endif
 	       <div>Contraseña *<input type="password" required minlength="4" name="password"> </div>
	       <div>Repite la contraseña * <input type="password" name="password_confirmation" required > </div>
              @if ($errors->has('password_confirmation'))
                <span class="help-block text-danger" role="alert">
                    <strong>{{ $errors->first('password_confirmation') }}</strong>
                </span>
            @endif
    {!! NoCaptcha::display() !!}
    {{--
    @if ($errors->has('g-recaptcha-response'))
        <span class="help-block text-danger" role="alert">
            <strong>{{ $errors->first('g-recaptcha-response') }}</strong>
        </span>
    @endif--}}
		<div>
		<div>
			<button type="submit">Enviar</button>
		</div>
		 <span class="help-block text-danger" role="alert">
		*requerido
		</span>
	</div>
<div>
	@if(count($errors)>0)
		{{$errors}}
	@endif
</div>
</form>
@endsection
@section('scripts')
@parent
{!! NoCaptcha::renderJs() !!}
@endsection