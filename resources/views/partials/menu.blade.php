<div id="Menu">
          <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
                 <a class="navbar-brand" href="{{ route('/') }}">
                    {{ config('app.name') }}
                </a> 
@guest
     <a class="nav-link" href="{{ route('Registro') }}">Registro</a>

     <a class="nav-link" href="{{ route('Login') }}">{{ __('Login') }}</a>
@else
    <a class="nav-link" href="{{ route('Usuario/') }}"    >
			Usuario
    </a>
    <a class="nav-link" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
			salir
    </a>                     
@endguest
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
               <span class="navbar-toggler-icon"></span>
                </button> 
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                 	<ul class="navbar-nav mr-auto">
                        <li class="nav-item">                        		
                        </li>  
                    </ul>
             	</div>
 
        </nav>
</div>
<!-- formulario de cerrar sesion -->
<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
</form>   