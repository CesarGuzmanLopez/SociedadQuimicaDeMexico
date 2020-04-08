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
    <th>ID</th> <th>Name</th>  <th>slug</th><th>Valor</th><th>accion</th><th>Enviar</th>
  </tr>
@foreach($Roles as $Role )
  <form action="{{route('RolesPermisos/ActualizarEliminarRol')}}" method="post">
  <tr>
  	@csrf
  		<input type="hidden" name="id" value="{{$Role->id}}">
	    <td>{{$Role->id}}			</td>
	    <td><input value="{{$Role->name}}" name="name"></td>
	    <td><input value="{{$Role->slug}}"  name="slug"></td>
	   	<td><input value="{{$Role->Valor}}"  name="Valor"></td>
	    <td>Cambiar{{ Form::radio('accion', 'cambiar', true)}} Eliminar{{ Form::radio('accion', 'eliminar', false)}}</td>
	    <td><button type="submit">enviar</button></td>
  </tr>
  </form>
  @endforeach
</table>
<br>
<div>
	<h3>Añadir Role</h3>
	<form action="{{route('RolesPermisos/AgregarRolPost')}}" method="post">
		@csrf
		<p>Nombre Role<input value="{{old('name')??'' }}" name="name" type="text" placeholder="Nombre Role" required="required"></p>
		<p>Slug <input value="{{old('slug')??'' }}" name="slug"  type="text" placeholder="Nombre_Role" required="required"></p>
		<p>Valor <input value="{{old('Valor')??'' }}"  name="Valor"  type="text" placeholder="Valor" required="required"></p>
		<p><button type="submit">Agregar Role</button></p> 
	</form>
	@if(count($errors)>0)
		{{$errors}}
	@endif
</div>
<br>

@endsection