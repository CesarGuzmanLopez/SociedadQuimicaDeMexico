<?php
/**
*    @author Cesar Gerardo Guzman Lopez mail 88-8live.com.mx 
*    Vista principal subir bajar y cambiar  roles y permisos
*/
?>
@extends('layouts.app')
@section('content')
<form action="{{route('AdministrarUsuarios/agregarPost')}}" method="post" ccept-charset="UTF-8"  enctype="multipart/form-data">
			@csrf
 			<div>Nombre <input  type="text" name="name"   value="{{old('name')}}" ></div>
			<div>Apellido <input type="text" name="Apellido"  value="{{old('Apellido')}}"></div>
			<div>Telefono <input type="text" name="Telefono" value="{{old('Telefono')}}" ></div>
			<div>Nombre de usuario <input type="text" name="Nombre_de_usuario" value="{{old('Nombre_de_usuario') }}" ></div>
 			<div>Coreo electronico <input type="email" name="email" value="{{old('email')}}" > </div>
			<div>Grado_Academico
				<select name="Grado_Academico">
					<option value=""></option>
					<option value="Estudiante_nivel_basico"  >	Estudiante nivel basico</option>
					<option value="Estudiante_nivel_medio"  >	Estudiante nivel medio</option>
					<option value="Estudiante_nivel_medio_superior" >Estudiante nivel medio superior</option>
					<option value="Estudiante_nivel_superior" >Estudiante nivel superior</option>
					<option value="Estudiante_de_maestria"  >Estudiante maestria</option>
					<option value="Estudiante_de_doctorado" >Estudiante doctorado</option> 
					<option value="Ingeniero" >Ingeniero</option>
					<option value="Licenciado" >Licenciado</option>
					<option value="Maestro"  >Maestro</option>
					<option value="Doctor"  >Doctor</option>
			</select> 
			</div> 
			<div>
					Role 
			<select name="Role"> 
			@foreach($Roles as $Role)
				<option value="{{$Role->id}}" >
					{{$Role->name}}
				</option>
			@endforeach
			</select>
			</div>
			<div>
				contraseña <input name="Password" type="password">
			</div>
			<button type="submit">Enviar </button>
			</form>
			@if(count($errors)>0)
			{{$errors}}
			@endif
@endsection