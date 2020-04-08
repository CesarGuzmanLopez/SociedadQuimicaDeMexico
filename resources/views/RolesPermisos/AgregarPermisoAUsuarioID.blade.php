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
    <h1>Permisos</h1>
<form action="{{route('RolesPermisos/AgregarPermisoAUsuario_post')}}" method="post">
	@csrf
	<input type="hidden" name="UserID" value=" {{$Usuario->id}}">
		@foreach($Permisos as $Permiso)
		<p>
			{{$Permiso->name}} <input type="checkbox" name="Permisos[]" value="{{$Permiso->id}}" {{($Usuario->permissions()->find($Permiso->id))?"checked": ""}}>
		</p>
		@endforeach
	<button type="submit">Enviar</button>
 </form>
@endsection