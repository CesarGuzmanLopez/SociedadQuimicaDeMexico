<?php
/**
*    @author Cesar Gerardo Guzman Lopez mail 88-8live.com.mx 
*    Vista principal del dashboard del usuario
*/
?>
@extends('layouts.app')
@section('content')
 {!!Auth::User()!!}
<h1><a href="{{route('Usuario/Cambiar_Perfil')}}" >Modificar perfil</a></h1>
@can("ver-permisos")
<h1><a href="{{route('RolesPermisos/')}}">Modificar Permisos</a></h1>
@endcan
@can('mod-usuarios') 
<h1><a href="AdministrarUsuarios">Administrar usuarios</a></h1> 
@endcan
<h1><a href="{{route('Usuario/IngresarDireccion')}}" >ingresar Direccion</a></h1>
@endsection