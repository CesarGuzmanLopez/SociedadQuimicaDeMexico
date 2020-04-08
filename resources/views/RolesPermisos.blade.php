<?php
/**
*    @author Cesar Gerardo Guzman Lopez mail 88-8live.com.mx 
*    Vista principal subir bajar y cambiar  roles y permisos
*/
?>
@extends('layouts.app')
@section('content')
<p><a href="{{route('RolesPermisos/AgregarPermiso')}}">Agregar Permiso</a></p>
<p><a href="{{route('RolesPermisos/AgregarRol')}}">Agregar Rol</a></p>
<p><a href="{{route('RolesPermisos/AgregarPermisoARol')}}">Agregar Permiso a rol</a></p>
<p><a href="{{route('RolesPermisos/AgregarPermisoAUsuario')}}">Agregar Permiso a usuario</a></p>
<p><a href="{{route('RolesPermisos/AgregarRolAUsuario')}}">Agregar rol a usuario</a></p>
<p><a href="{{route('RolesPermisos/CrudRolesYUsuario')}}">CRUD Roles y permios</a></p>
@endsection