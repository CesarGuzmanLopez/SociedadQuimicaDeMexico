{{--
<!--
    @author Cesar Gerardo Guzman Lopez mail 88-8live.com.mx 
    vista principal de la pagina web
 -->
--}}
@extends('layouts.app')
@section('content')
 <div class="main">
       <div class="">
            <div class="login-form">
               <form action="{{route('auth')}}" method="post">
                  @csrf
                  <div class="form-group">
                     <label>User Name</label>
                     
                     <input type="text" name="Usuario"  class="form-control" minlength="4" placeholder="'Correo' o 'nombre de usuario'"   required> 
                  </div>
                  <div class="form-group">
                     <label>Contraseña</label>
                     <input type="password" name="Password" class="form-control" minlength="4" placeholder="Contraseña" required>
                  </div>
                  <button type=submit class="btn btn-secondary">acceder</button>
               </form>
            	<a href="{{route('Registro')}}">Registro</a>
               	<a href="{{route('Recuperar_pass')}}">Recuperar contraseña</a>
            </div>
         </div>
</div>

@endsection