<?php
/**
 *    @author Cesar Gerardo Guzman Lopez mail 88-8live.com.mx
 *   vista para rellenar los datos faltantes de perfil
 *   
 */
?>
@extends('layouts.app')
@section('content')


@if($cp===0)
   <table class="table table-striped table-hover table-reflow">

@foreach($direcciones as $key=>$value)
	           <tr>
                    <th ><strong> {{ $key }}: </strong></th>
                 
                    <td>  {{ $value }} <td>
                </tr>
@endforeach
</table>
<form action="{{route('Usuario/IngresarDireccion')}}">
	
		Codigo Posta<input type="number" name="cp" required>
		<button type="submit">agregar direccion</button>
</form>
@else
	<form action="{{route('Usuario/ingresarDireccionPost')}}" method="post"> 
		 @csrf
		Codigo Postal <input type="text" name="Codigo_Postal" value="{{$cp}}" disabled="disabled" required>
		<input type="hidden" name="Codigo_Postal" value="{{$cp}}" >
<br>
<br>Titulo<input type="text" name="Slug" value="{{old('Slug')??$datosCP->Slug??''}}">

<br>		Pais 				<input type="text" name="Pais" value="{{old('Pais')?? (($datosCP->Pais??''  =='MX')?'México':'')  }}" required>
		 <br>Estado <input type="text" name="Estado" value="{{old('Estado')??$datosCP->Estado??''}}" required>
<br>		 Municipio <input type="text" name="Municipio" value="{{ old('Municipio')??$datosCP->Municipio??'' }}" required>
<br>		Colonia		<input type="text" name="Colonia" value="{{old('Colonia')??$datosCP->Colonia??''}}" required>
<br>		<input type="hidden" name="latitud" value="{{$datosCP->latitud??''}}">
		<input type="hidden" name="longitud" value="{{$datosCP->longitud??''}}">
		<input type="hidden" name="longitud" value="{{$datosCP->longitud??''}}">
		<input type="hidden" name="occuracy" value="{{$datosCP->occuracy??''}}">
<br>		Calle o avenida<input type="text" name="Calle_O_Avenida" required>
<br>		Numero<input type="text" name="Numero_exterior">
<br>		Numero interior <input type="text " name="Numero_interior" >
<br>		Referencias <input type="text" name="Referencias">
		
	<br>	<button type="submit">agregar direccion</button>
</form>
@endif

@endsection
    
