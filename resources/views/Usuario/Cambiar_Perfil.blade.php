<?php
/**
 *    @author Cesar Gerardo Guzman Lopez mail 88-8live.com.mx
 *   vista para rellenar los datos faltantes de perfil 
 *   
 *  @todo faltaria poner las configuraciones de targeta de credito
 *  y toda la infomacion de pago
 * property User Auth::user()
 */
?>
@extends('layouts.app')
@section('content')	
<div>
		<form action="{{route('Usuario/Cambiar_Perfil_post')}}" method="post"ccept-charset="UTF-8" enctype="multipart/form-data">
			@csrf
			<div>Nombre <input  type="text" name="name"   value="{{old('name')??Auth::user()->name }}" ></div>
			<div>Apellido <input type="text" name="Apellido"  value="{{old('Apellido')??Auth::user()->Apellido }}"></div>
			<div>Telefono <input type="text" name="Telefono" value="{{old('Telefono')??Auth::user()->Telefono }}" ></div>
			<div>Nombre de usuario <input type="text" name="Nombre_de_usuario" value="{{old('Nombre_de_usuario')??Auth::user()->Nombre_de_usuario }}" ></div>
			<div>Fecha de Nacimiento <input type="date" name="Fecha_De_Nacimiento" value="{{old('Fecha_De_Nacimiento')??Auth::user()->Fecha_De_Nacimiento }}" > </div>
		
			<div>Coreo electronico <input type="email" name="email" value="{{old('email')??Auth::user()->email }}" > </div>
			<div>Grado_Academico
				<select name="Grado_Academico">
					<option value=""></option>
					<option value="Estudiante_nivel_basico" {{(Auth::user()->Grado_Academico ==="Estudiante_nivel_basico" )?"selected":""  }} >	Estudiante nivel basico</option>
					<option value="Estudiante_nivel_medio" {{(Auth::user()->Grado_Academico ==="Estudiante_nivel_medio" )?"selected":""  }}>	Estudiante nivel medio</option>
					<option value="Estudiante_nivel_medio_superior" {{(Auth::user()->Grado_Academico ==="Estudiante_nivel_medio_superior" )?"selected":""  }}>Estudiante nivel medio superior</option>
					<option value="Estudiante_nivel_superior" {{(Auth::user()->Grado_Academico ==="Estudiante_nivel_superior" )?"selected":""  }}>Estudiante nivel superior</option>
					<option value="Estudiante_de_maestria" {{(Auth::user()->Grado_Academico ==="Estudiante_de_maestria" )?"selected":""  }}>Estudiante maestria</option>
					<option value="Estudiante_de_doctorado" {{(Auth::user()->Grado_Academico ==="Estudiante_de_doctorado" )?"selected":""  }}>Estudiante doctorado</option> 
					<option value="Ingeniero" {{(Auth::user()->Grado_Academico ==="Ingeniero" )?"selected":""  }}>Ingeniero</option>
					<option value="Licenciado" {{(Auth::user()->Grado_Academico ==="Licenciado" )?"selected":""  }}>Licenciado</option>
					<option value="Maestro" {{(Auth::user()->Grado_Academico ==="Maestro" )?"selected":""  }}>Maestro</option>
					<option value="Doctor" {{(Auth::user()->Grado_Academico ==="Doctor" )?"selected":""  }}>Doctor</option>
			</select> 
			</div>
			<div>
				@if(Auth::user()->path_Image)
					<img alt="Imagen de usuario" src="{{ asset(Storage::url( Auth::user()->path_Image ))}}">
				@endif 
					 Imagen de usuario<input type="file"name="Imagen"> (Cambiara la imagen actual)
			</div> 
			<div>Url de pagina personal <input type="url" name="url_Pagina_Personal" value="{{old('url_Pagina_Personal')??Auth::user()->url_Pagina_Personal }}" ></div>
			<div>Perfil visible {{Form::checkbox('Visble_perfil', '1', (old('Visble_perfil')     ??Auth::user()->Visble_perfil     ))}}</div>
			<div>Recibir correos publicitarios y cursos {{Form::checkbox('recibir_Correos', '1', (old('recibir_Correos')     ??Auth::user()->recibir_Correos    ))}}</div>
			<div><button type="submit" class="btn btn-info">Cambiar</button> <a href="{{route('Usuario/')}}" class="btn btn-warning"> cancelar y regresar</a></div> 
		</form>
		@if(count($errors)>0)
			{{$errors}}
		@endif
</div> 
@endsection