<?php
namespace app\Http\Controllers\Sesion;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use App\Models\CodigoPostal;
use App\Models\Direccione;

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
            'email'                 => 'required|email|min:3|max:35',
            'url_Pagina_Personal'=>"active_url|nullable",
            'Nombre_de_usuario'=>"alpha_dash|nullable",
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
    public function Cambiar_Clave(){
    	 return  view("Usuario.Cambiar_Clave");   
    }
    public function Cambiar_ClavePost(Request $request ){
    	$request->validate([
    			'g-recaptcha-response' => 'required|captcha',
    	]);
    	$this->validate($request, [
    			'old_password'                 => 'required',
    			'password'              => 'required|min:4|max:60',
    			'password_confirmation' => 'required|same:password',
    	]);
    	if (Hash::check($request->old_password,Auth::user()->getAuthPassword() )) {
    		$user = User::find(Auth::user()->id);
     		$user->password =bcrypt($request->password); 
    		$user->save();
    		return redirect()->route("Usuario/");
    	} 	
    	return back(302);
    }
    public function IngresarDireccion(Request $request) {
    	$cp =0;
    	
    	$datosCP="";
    	if($request->has("cp")){
    		$cp = $request->cp;
    		$datosCP = CodigoPostal::where("Codigo_Postal",$cp )->first();
    	}
    	$data =array(
    			'direcciones'=> User::find(Auth::user()->getAuthIdentifier())->direcciones,
    		'datosCP'=>$datosCP,
    		'cp'=>$cp, 	
    	);
    	return view("Usuario.IngresarDireccion")->with($data);
    }
    public function ingresarDireccionPost(Request $request){
    	$direccion =new  Direccione($request->all());;
    	$direccion->ID_User = Auth::user()->getAuthIdentifier();
    	
    	$direccion->save();
    	return redirect()->route("Usuario/IngresarDireccion");
    }
    
}

