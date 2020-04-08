<?php
/**
 *    @author Cesar Gerardo Guzman Lopez mail 88-8live.com.mx
 *		Añadir Permisos a Usuarios
 */
?>
@extends('layouts.app')
@section('content') 
<table border="1px">
  <tr>
    <th>ID</th> <th>Name</th>  <th>Nombre de usuario</th><th>Permisos</th> <th>Agregar permiso</th>
  </tr>
@foreach($Usuarios as $Usuario )
   <tr> 
	    <td> {{$Usuario->id}}	</td>
	    <td> {{$Usuario->name}}</td>
	    <td> {{$Usuario->Nombre_de_usuario}}</td>
	    <td>
	    @foreach($Usuario->permissions as $permiso)
	     	<p>{{$permiso->name}},</p>
	    @endforeach
	    </td>
	    <td><a href="{{route('RolesPermisos/AgregarPermisoAUsuario/',$Usuario->id)}}">Agregar Permisos </a></td>
  </tr>
   @endforeach
</table> 

 

@endsection