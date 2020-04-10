<?php
/**
 *    @author Cesar Gerardo Guzman Lopez mail 88-8live.com.mx
 *		Añadir relaciones
 */
?>
@extends('layouts.app')
@section('content')
<h2 class="text-center bg-danger">Roles</h2>
<div class="table-responsive">
<table  class="table table-striped">
<thead class="thead-light "> 
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
  </thead>
  <tbody class="tbody-light">
  @foreach($Roles as $Role) 
  <tr>	
	<td>{{$Role->name}}
	  	<form action="{{route('RolesPermisos/CrudRolesYUsuarioPost')}}" id="role_{{$Role->id}}" method="post"></form>
  		<input type="hidden" name="_token" value="{{csrf_token()}}" form="role_{{$Role->id}}"> 
  		<input type="hidden" name="id_Role" form="role_{{$Role->id}}" value="{{$Role->id}}">
  		<input type="hidden" name="Modificar" form="role_{{$Role->id}}" value="role">
	</td> 
	  		@foreach($Permisos as $Permiso)
	  		<td>
				 ({{$Permiso->slug}})<input type="checkbox" form="role_{{$Role->id}}" name="Permisos[]" value="{{$Permiso->id}}" {{($Role->permissions()->find($Permiso->id))?"checked": ""}}>
	  		</td>
	  		@endforeach 
	  		<td>
	  			<button type="submit" form="role_{{$Role->id}}">Enviar moificar</button>
	  		</td> 
  </tr>
  @endforeach
  </tbody>
</table>
</div>
<h2 class="text-center bg-danger">Usuarios (Roles y permisos)</h2>
<div class="table-responsive">
<table  class="table table-striped">
<thead class="thead-light ">
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
    </thead>
    <tbody>
    @foreach($Usuarios as $Usuario) 
	<tr>
	
	<td>
		<form action="{{route('RolesPermisos/CrudRolesYUsuarioPost')}}" id="FormUser_{{$Usuario->id}}" method="post"></form>
    	<input type="hidden" name="id_Usuario" value="{{$Usuario->id}}" form="FormUser_{{$Usuario->id}}">
  		<input type="hidden" name="Modificar" value="Usuario" form="FormUser_{{$Usuario->id}}">
 	  	<input type="hidden" name="_token" value="{{csrf_token()}}" form="FormUser_{{$Usuario->id}}">
	 {{$Usuario->name}} {{$Usuario->Apellido}} ({{ $Usuario->Nombre_de_usuario}}) </td>
		@foreach($Roles as $Role)
  		<td>({{$Role->slug}})<input  type="checkbox" form="FormUser_{{$Usuario->id}}" name="Roles[]" value="{{$Role->id}}" {{($Usuario->roles()->find($Role->id))?"checked": ""}}></td>
  	  	@endforeach 
  	  	@foreach($Permisos as $Permiso)
 			<td><input type="checkbox" form="FormUser_{{$Usuario->id}}" name="Permisos[]" value="{{$Permiso->id}}" {{($Usuario->permissions()->find($Permiso->id))?"checked": ""}}></td>
	  	@endforeach 
  		<td>
	  		<button type="submit" form="FormUser_{{$Usuario->id}}">Enviar moificar</button>
	  	</td>
  </tr>
	@endforeach
	</tbody>
</table> 
</div> 
@endsection