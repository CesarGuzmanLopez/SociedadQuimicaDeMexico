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
<h1><a href="{{route('RolesPermisos/')}}">Modificar Permisos</a></h1>

@endsection