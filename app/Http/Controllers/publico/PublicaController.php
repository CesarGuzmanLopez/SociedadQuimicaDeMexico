<?php
namespace app\Http\Controllers\publico;
use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Response;
use Illuminate\Routing\Route;
use Illuminate\Http\Request;

/**
 * @author Cesar Gerardo Guzman Lopez mail 88-8@live.com.mx
 * @version 0.1
 */
class PublicaController extends Controller
{
    function __construct(){
    }
    /**
     * funcion que contiene el index la pagina principal 
     * @param void
     * @return \Facade\FlareClient\View vista_princpal
     */
    function index(){ return view("index");}
    /**
     * funcion que contiene el index la pagina principal
     * @param void
     * @return \Facade\FlareClient\View vista_princpal
     */ 
    function login(){
        if (Auth::check()) return redirect("Usuario");
        return view("login"); 
    }
    /**
     *  Formulario de registro
     * @return \Illuminate\Routing\Redirector|\Illuminate\Http\RedirectResponse 
     */
    function Registro(){
        if (Auth::check()) return redirect("Usuario");
        return view("Registro");
    }
    function Registrar(Request $request){
        
    }
    /**
     * Recive los datos para autentificar a un usuario
     * @param Request $request
     * @return Route usuario
     */ 
    public function authenticate(Request $request){ 
        if($request->has("Usuario") && $request->has("Password")){
           $email=$request->Usuario; 
           if(!strpos($email, '@') ){
               $email = User::where("Nombre_de_usuario",$email)->first();
                if($email) $email = $email->email;
           }
           if (Auth::attempt(['email' => $email, 'password' => $request->Password])) 
               return redirect("Usuario"); 
        }
        return back();
    }
    public function logout(Request $request)
    {
        Auth::guard()->logout(); 
        $request->session()->invalidate(); 
        $request->session()->regenerateToken(); 
        return $request->wantsJson()
        ? new Response('', 204)
        : redirect('/');
    } 
}

