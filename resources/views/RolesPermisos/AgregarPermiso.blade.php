<?php
/**
*    @author Cesar Gerardo Guzman Lopez mail 88-8live.com.mx 
*	vista para agregar un rol
*/
?>
@extends('layouts.app')
@section('content')

<table border="1px">
  <tr>
    <th>ID</th> <th>Name</th>  <th>slug</th><th>accion</th><th>Enviar</th>
  </tr>
@foreach($Permisos as $permiso )
  <form action="{{route('RolesPermisos/ActualizarEliminarPermiso')}}" method="post">
  <tr>
  	@csrf
  		<input type="hidden" name="id" value="{{$permiso->id}}">
	    <td>{{$permiso->id}}			</td>
	    <td><input value="{{$permiso->name}}" name="name"></td>
	    <td><input value="{{$permiso->slug}}"  name="slug"></td>
	    <td>Cambiar{{ Form::radio('accion', 'cambiar', true)}} Eliminar{{ Form::radio('accion', 'eliminar', false)}}</td>
	    <td><button type="submit">enviar</button></td>
  </tr>
  </form>
  @endforeach
</table>
<br>
<div>
	<h3>Añadir Permiso</h3>
	<form action="{{route('RolesPermisos/AgregarPermisoPost')}}" method="post">
		@csrf
		<p>Nombre Permiso<input value="{{old('name')??'' }}" name="name" type="text" placeholder="Nombre Permiso" required="required"></p>
		<p>Slug <input value="{{old('slug')??'' }}" name="slug"  type="text" placeholder="Nombre_Permiso" required="required"></p>
		<p><button type="submit">Agregar permiso</button></p> 
	</form>
	@if(count($errors)>0)
		{{$errors}}
	@endif
</div>
<br>

@endsection