<?php
/**
*    @author Cesar Gerardo Guzman Lopez mail 88-8live.com.mx 
        vista principal de la pagina web
*/
?>
@extends('layouts.app')
@section('content')
	
<?php 
$data = array(
		array(
				"name" => 'ROOT',
				"slug" =>   'root',
				"id"=>1,
		),
		array(
				"name" => 'Administrador',
				"slug" =>   'administrador',
				"id"=>2,
		),
		array(
				"name" => 'Programador',
				"slug" =>   'programador',
				"id"=>3,
		),
		array(
				"name" => 'Delineante',
				"slug" =>   'delineante',
				"id"=>4,
		),
		array(
				"name" => 'Diseñador',
				"slug" =>   'diseñador',
				"id"=>5,
		),
		array(
				"name" => 'Staff',
				"slug" =>   'staff',
				"id"=>6,
		),
		array(
				"name" => '',
				"slug" =>   '',
				"id"=>7,
		),
		array(
				"name" => 'Administrador Usuarios',
				"slug" =>   'adm-Usuarios',
				"id"=>8,
		),
		array(
				"name" => 'Administrador tienda',
				"slug" =>   'adm-tienda',
				"id"=>9,
		),
		array(
				"name" => 'Administrador de permisos',
				"slug" =>   'adm-permisos',
				"id"=>10,
		),
		array(
				"name" => 'Administrador de membrecia',
				"slug" =>   'adm-membrecia',
				"id"=>11,
		),
		array(
				"name" => 'Administrador de paginas',
				"slug" =>   'adm-paginas',
				"id"=>12,
		),
		array(
				"name" => 'Administrador de eventos',
				"slug" =>   'adm-eventos',
				"id"=>13,
		),
		array(
				"name" => 'Creador de contenido',
				"slug" =>   'creador-contenido',
				"id"=>14,
		),
		array(
				"name" => 'Creador de paginas',
				"slug" =>   'creador-paginas',
				"id"=>15,
		),
		array(
				"name" => 'Usuario con membrecia',
				"slug" =>   'Usuario-membrecia',
				"id"=>16,
		),
		array(
				"name" => 'Usuario',
				"slug" =>   'Usuario',
				"id"=>17,
		),
		array(
				"name" => 'permios',
				"slug" =>   'Usuario',
				"id"=>18,
		)
); 
?>
@foreach($data as $dato)
	{{$dato['slug']}}
@endforeach
@endsection