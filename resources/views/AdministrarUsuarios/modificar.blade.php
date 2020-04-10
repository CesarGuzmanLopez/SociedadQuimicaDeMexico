<?php
/**
*    @author Cesar Gerardo Guzman Lopez mail 88-8live.com.mx 
*    Vista principal subir bajar y cambiar  roles y permisos
*/
?>
@extends('layouts.app')
@section('content')
<form action="{{route('AdministrarUsuarios/modificarPost')}}" method="post" ccept-charset="UTF-8"  enctype="multipart/form-data">
			@csrf
			<input  type="hidden" name="id" value="{{$Usuario->id}}">
			<div>Nombre <input  type="text" name="name"   value="{{old('name')??$Usuario->name }}" ></div>
			<div>Apellido <input type="text" name="Apellido"  value="{{old('Apellido')??$Usuario->Apellido }}"></div>
			<div>Telefono <input type="text" name="Telefono" value="{{old('Telefono')??$Usuario->Telefono }}" ></div>
			<div>Nombre de usuario <input type="text" name="Nombre_de_usuario" value="{{old('Nombre_de_usuario')??$Usuario->Nombre_de_usuario }}" ></div>
			<div>Fecha de Nacimiento <input type="date" name="Fecha_De_Nacimiento" value="{{old('Fecha_De_Nacimiento')?? $Usuario->Fecha_De_Nacimiento->format('Y-m-d') }}" > </div>
			<div>Coreo electronico <input type="email" name="email" value="{{old('email')??$Usuario->email }}" > </div>
			<div>Grado_Academico
				<select name="Grado_Academico">
					<option value=""></option>
					<option value="Estudiante_nivel_basico" {{($Usuario->Grado_Academico ==="Estudiante_nivel_basico" )?"selected":""  }} >	Estudiante nivel basico</option>
					<option value="Estudiante_nivel_medio" {{($Usuario->Grado_Academico ==="Estudiante_nivel_medio" )?"selected":""  }}>	Estudiante nivel medio</option>
					<option value="Estudiante_nivel_medio_superior" {{($Usuario->Grado_Academico ==="Estudiante_nivel_medio_superior" )?"selected":""  }}>Estudiante nivel medio superior</option>
					<option value="Estudiante_nivel_superior" {{($Usuario->Grado_Academico ==="Estudiante_nivel_superior" )?"selected":""  }}>Estudiante nivel superior</option>
					<option value="Estudiante_de_maestria" {{($Usuario->Grado_Academico ==="Estudiante_de_maestria" )?"selected":""  }}>Estudiante maestria</option>
					<option value="Estudiante_de_doctorado" {{($Usuario->Grado_Academico ==="Estudiante_de_doctorado" )?"selected":""  }}>Estudiante doctorado</option> 
					<option value="Ingeniero" {{($Usuario->Grado_Academico ==="Ingeniero" )?"selected":""  }}>Ingeniero</option>
					<option value="Licenciado" {{($Usuario->Grado_Academico ==="Licenciado" )?"selected":""  }}>Licenciado</option>
					<option value="Maestro" {{($Usuario->Grado_Academico ==="Maestro" )?"selected":""  }}>Maestro</option>
					<option value="Doctor" {{($Usuario->Grado_Academico ==="Doctor" )?"selected":""  }}>Doctor</option>
			</select> 
			</div>
			<div>
				@if($Usuario->path_Image)
					<img alt="Imagen de usuario" src="{{ asset(Storage::url( $Usuario->path_Image ))}}">
				@endif 
					 Imagen de usuario<input type="file"name="Imagen"> (Cambiara la imagen actual)
			</div> 
			<div>
			Role 
			<select name="Role">
			
			@foreach($Roles as $Role)
				<option value="{{$Role->id}}" {{($Usuario->Roles()->first()->id === $Role->id )?"selected":""  }}>
					{{$Role->name}}
				</option>
			@endforeach
			</select>
			<div>
			contraseña  <input name="Password" type="password"></div>
			</div>
			
			<button type="submit">Enviar </button>
			</form>
@endsection