<?php
/**
*    @author Cesar Gerardo Guzman Lopez mail 88-8live.com.mx 
*    Vista principal subir bajar y cambiar  roles y permisos
*/
?>
@extends('layouts.app')
@section('content')
<div class="table-responsive center-block">
<table class="table table-striped table-hover table-borderless">
	<thead class="thead-ligh">
				<tr >
			<th colspan="7" class="text-center" >Usuarios</th>
	 
			 
			
		</tr>
		<tr >
			<th class="" >Nombre</th>
			<th class="">Apellido</th>
			<th class="">Nombre de usuaruio</th>
			<th class="">Correo</th>
			<th>Teléfono</th>
			<th class="">Rol mas Alto</th> 
			<th class="">Modficar</th>
			
		</tr>
	</thead>
	<tbody> 
		@foreach($Usuarios as $usuario)
	<tr>
		<td>{{$usuario->name}}</td>
		<td>{{$usuario->Apellido}}</td>
		<td>{{$usuario->Nombre_de_usuario}}</td>
		<td>{{$usuario->email}}</td>
		<td>{{$usuario->Telefono}}</td>
		<td>{{$usuario->roles()->first()->name}}</td>
		<td class=""><a href="{{route('AdministrarUsuarios/modificar',$usuario->id)}}" class="btn btn-info text-light"> Editar </a></td>
	</tr>
		@endforeach
	</tbody>
	<tfoot> 
	</tfoot>
</table>
<h1><a href="{{route('AdministrarUsuarios/AgregarUsuario')}}" class="btn-info text-light"> agregar </a></h1>
</div> 
@endsection