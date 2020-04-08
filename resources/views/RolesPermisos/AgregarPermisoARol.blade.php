<?php
/**
 *    @author Cesar Gerardo Guzman Lopez mail 88-8live.com.mx
 *		Añadir Permisos a roles
 */
?>
@extends('layouts.app')
@section('content') 
<table border="1px">
  <tr>
    <th>ID</th> <th>Name</th>  <th>slug</th><th>Valor</th><th>Permisos</th> <th>Agregar permiso</th>
  </tr>
@foreach($Roles as $Role )
   <tr> 
	    <td> {{$Role->id}}	</td>
	    <td> {{$Role->name}}</td>
	    <td> {{$Role->slug}} </td>
	    <td> {{$Role->Valor}}</td>
	    <td>
	    @foreach($Role->permissions as $permiso)
	     	<p>{{$permiso->name}},</p>
	    @endforeach
	    </td>
	    <td><a href="{{route('RolesPermisos/AgregarPermisoARol/',$Role->id)}}">Agregar Permisos </a></td>
  </tr>
   @endforeach
</table> 

 

@endsection