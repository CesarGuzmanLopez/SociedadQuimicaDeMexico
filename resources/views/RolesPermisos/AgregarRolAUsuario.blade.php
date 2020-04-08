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
    <th>ID</th> <th>Name</th>  <th>Nombre de usuario</th><th>Roles</th> <th>Agregar permiso</th>
  </tr>
@foreach($Usuarios as $Usuario )
   <tr> 
	    <td> {{$Usuario->id}}	</td>
	    <td> {{$Usuario->name}}</td>
	    <td> {{$Usuario->Nombre_de_usuario}}</td>
	    <td>
	    @foreach($Usuario->Roles as $Role) 
	     	<p>{{$Role->name}},</p>
	    @endforeach
	    </td>
	    <td><a href="{{route('RolesPermisos/AgregarRolAUsuario/',$Usuario->id)}}">Agregar Roles </a></td>
  </tr>
   @endforeach
</table> 
@endsection