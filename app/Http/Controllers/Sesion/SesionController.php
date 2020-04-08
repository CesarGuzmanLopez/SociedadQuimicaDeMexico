<?php
namespace app\Http\Controllers\Sesion;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

/**
 * Controlador para todo lo que tenga que ver con la sesion
 * y el perfil del usuario
 * @author Cesar Gerardo Guzman Lopez
 *        
 */
class SesionController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return SesionController
     */
    
    public function __construct(){}
    
    /**
     * pagina principal 
     * @return \Illuminate\View\View|\Illuminate\Contracts\View\Factory 
     */
    public function index()
    {
        return view("Usuario" );
    }
    public function Cambiar_Perfil(){
        return  view("Usuario.Cambiar_Perfil");     
    }
    public function Cambiar_Perfil_post(Request $request) {
        $this->validate($request, [
            'name'                  => 'required|string|min:3|max:35',
            'email'                 => 'required|email|min:3|max:35|unique:users',
            'url_Pagina_Personal'=>"active_url|nullable",
            'Nombre_de_usuario'=>"alpha_dash|nullable|unique:users",
        ]);
        
        $user = User::where("id",Auth::user()->id)->first();
        $tempUser = User::where("email",$request->email)->first();
        if($tempUser && $user->id!=$tempUser->id)
            return back(302);
     
        $tempUser = User::where("Nombre_de_usuario",$request->Nombre_de_usuario)->first();
        if($tempUser && $user->id!=$tempUser->id)
            return back(302);
        $tempUser = null;
        $user->name = $request->name;
        $user->Apellido = $request->Apellido; 
        $user->Telefono = $request->Telefono;
        $user->Nombre_de_usuario = $request->Nombre_de_usuario;
        $user->Fecha_De_Nacimiento = $request->Fecha_De_Nacimiento;
        $user->email = $request->email;
        $user->url_Pagina_Personal = $request->url_Pagina_Personal;
        $user->Visble_perfil = $request->Visble_perfil==true;
        $user->recibir_Correos = $request->recibir_Correos==true;
        $user->Grado_Academico = $request->Grado_Academico;
        $path = $user->path_Image;  
        if($request->hasFile("Imagen"))
            $path = $request->file('Imagen')->store('public/Usuarios/'.$user->id."/"); 
    
        $user->path_Image = $path;
        $user->save();
        return redirect()->route("Usuario/");   
    }
}

