<?php
/**
*    @author Cesar Gerardo Guzman Lopez mail 88-8live.com.mx 
*    Vista principal del dashboard del usuario
*/
?>
@extends('layouts.app')
@section('content')
 {!!Auth::User()!!}
<a href="{{route('Usuario/Cambiar_Perfil')}}" >Modificar perfil</a>
@can('create-tasks')
dflksjlk
@endcan
@endsection