<?php
/**
 *    @author Cesar Gerardo Guzman Lopez mail 88-8live.com.mx
 *		Añadir relaciones
 */
?>
@extends('layouts.app')
@section('content')
    <p><b>ID: </b> {{$Role->id}}	</p>
    <p><b>Nombre: </b>{{$Role->name}}</p>
    <p><b>Abreviacion: </b>{{$Role->slug}} </p>
    <p><b>Valo gerarquico: </b>{{$Role->Valor}}</p>
    <h1>Permisos</h1>
<form action="{{route('RolesPermisos/AgregarPermisoARol_post')}}" method="post">
	@csrf
	<input type="hidden" name="RoleID" value=" {{$Role->id}}">
		@foreach($Permisos as $Permiso)
		<p>
			{{$Permiso->name}} <input type="checkbox" name="Permisos[]" value="{{$Permiso->id}}" {{($Role->permissions()->find($Permiso->id))?"checked": ""}}>
		</p>
		@endforeach
	<button type="submit">Enviar</button>
 </form>
@endsection