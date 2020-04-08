<?php
/**
 *    @author Cesar Gerardo Guzman Lopez mail 88-8live.com.mx
 *		Añadir relaciones
 */
?>
@extends('layouts.app')
@section('content')
    <p><b>ID: </b> {{$Usuario->id}}	</p>
    <p><b>Nombre: </b>{{$Usuario->name}}</p>
    <p><b>User name: </b>{{$Usuario->Nombre_de_usuario}}</p>
    <h1>Roles</h1>
<form action="{{route('RolesPermisos/AgregarRolAUsuario_post')}}" method="post">
	@csrf
	<input type="hidden" name="UserID" value=" {{$Usuario->id}}">
		@foreach($Roles as $Role)
		<p>
			{{$Role->name}} <input type="checkbox" name="Roles[]" value="{{$Role->id}}" {{($Usuario->roles()->find($Role->id))?"checked": ""}}>
		</p>
		@endforeach
	<button type="submit">Enviar</button>
 </form>
@endsection