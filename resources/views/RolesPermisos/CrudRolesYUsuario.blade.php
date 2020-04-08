<?php
/**
 *    @author Cesar Gerardo Guzman Lopez mail 88-8live.com.mx
 *		Añadir relaciones
 */
?>
@extends('layouts.app')
@section('content')
<h2 class="text-center bg-danger">Roles</h2>
<table border="1" class="table table-striped">
  <tr>
    <th > * </th>
   	<th colspan="{{ count($Permisos) ??1 }}" class="text-center bg-danger"> Permisos </th> 
  	<th rowspan="2" class="text-center bg-info text-white">Modificar</th>
  </tr>
  <tr>
    <th> Roles </th>
  	@foreach($Permisos as $Permiso)
   	<th> {{$Permiso->name}} </th>
  	@endforeach
  </tr>
  @foreach($Roles as $Role) 
  <tr>	
  		<form action="{{route('RolesPermisos/CrudRolesYUsuarioPost')}}" method="post">
  		@csrf
  		<input type="hidden" name="id_Role" value="{{$Role->id}}">
  		<input type="hidden" name="Modificar" value="role">
  		<td>{{$Role->name}}</td> 
	  		@foreach($Permisos as $Permiso)
	  		<td>
				<input type="checkbox" name="Permisos[]" value="{{$Permiso->id}}" {{($Role->permissions()->find($Permiso->id))?"checked": ""}}>
	  		</td>
	  		@endforeach 
	  		<td>
	  			<button type="submit">Enviar moificar</button>
	  		</td>
  		</form>
  </tr>
  @endforeach
</table>
<h2 class="text-center bg-danger">Usuarios (Roles y permisos)</h2>
<table border="1" class="table table-striped">
  <tr>
    <th > * </th>
   	<th colspan="{{ count($Roles) ??1 }}" class="text-center bg-danger"> Roles </th>
   	<th colspan="{{ count($Permisos) ??1 }}" class="text-center bg-info text-white"> Permisos</th> 
  	<th rowspan="2" class="text-center">Modificar</th>
  </tr>
  <tr>
  	<th>Usuario (Nombre de Usuario)</th> 
  	
  	@foreach($Roles as $Role)
  			<th>{{$Role->name}}</th>
  	@endforeach
  	@foreach($Permisos as $Permiso)
  			<th>{{$Permiso->name}}</th>
  	@endforeach 
  </tr>
    @foreach($Usuarios as $Usuario) 
	<tr>
	   <form action="{{route('RolesPermisos/CrudRolesYUsuarioPost')}}" method="post">
    	<input type="hidden" name="id_Usuario" value="{{$Usuario->id}}">
  		<input type="hidden" name="Modificar" value="Usuario">
 	  @csrf
  
  		<td> {{$Usuario->name}} {{$Usuario->Apellido}} ({{ $Usuario->Nombre_de_usuario}}) </td>
		@foreach($Roles as $Role)
  		<td><input type="checkbox" name="Roles[]" value="{{$Role->id}}"{{($Usuario->roles()->find($Role->id))?"checked": ""}}></td>
  	  	@endforeach 
  	  	@foreach($Permisos as $Permiso)
 			<td><input type="checkbox" name="Permisos[]" value="{{$Permiso->id}}" {{($Usuario->permissions()->find($Permiso->id))?"checked": ""}}></td>
	  	@endforeach
  		<td>
	  		<button type="submit">Enviar moificar</button>
	  	</td>
  </form>
  </tr>
  	
	@endforeach
</table> 
@endsection