<?php
namespace app\Http\Controllers\publico;
use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Http\Response;
use Illuminate\Routing\Route;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash; 
use Exception;
use App\Mail\Verificacion;
use App\Mail\Recuperar_pass;
use App\Models\password_resets; 
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
     * funcion Vista de login l
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
    /**
     * Formulario para verificar el correo
     * @param Request $request
     * @return  \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse|string
     */
    function Registrar(Request $request){
        $request->validate([
            'g-recaptcha-response' => 'required|captcha',  
        ]); 
        $this->validate($request, [
            'name'                  => 'required|string|min:3|max:35',
            'email'                 => 'required|email|unique:users',
            'password'              => 'required|min:4|max:60',
            'password_confirmation' => 'required|same:password',
        ]);
        try
        {
            $user = new User($request->all());  
            $user->remember_token = Str::random(60); 
            $user->password =  Hash::make($request->password);
            $user->Codigo_Confirmacion= Str::random(15);
            $data = array(
                'name'      =>  $user->name,
                'Apellido'=>$user->Apellido,
                'Codigo_Confirmacion'   =>   $user->Codigo_Confirmacion,
            );
            Mail::to($user->email)->send(new  Verificacion($data)); 
            
            $user->save();
      
        } catch (Exception $e) {
        	
        } 
        return "se ha enviado un correo <a href='/'>regresar</a> <b>falta vista para este mensaje</b>";
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
    /**
     * Funcion que cierra sesion y te redirige a home
     * @param Request $request
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function logout(Request $request)
    {
        Auth::guard()->logout(); 
        $request->session()->invalidate(); 
        $request->session()->regenerateToken(); 
        return $request->wantsJson()
        ? new Response('', 204)
        : redirect()->route("/");
    } 
    /**
     * Funcion que Verifica mail
     * @param String $request
     * @return \Illuminate\Routing\Redirector|\Illuminate\Http\RedirectResponse|\Illuminate\Http\RedirectResponse
     */
    public function Verificar($request){ 
        $user = User::where("Codigo_Confirmacion",$request)->first();
        if(!$user)  return redirect("/");
        $user->email_verified_at =date('Y-d-m H:i:s.v');
        $user->Codigo_Confirmacion=null;
        $user->save(); 
        return redirect()->route("Login");
    } 
    /**
     * @param Request $request
     * @param User $user
     * @return string
     */
    public function Recuperar_post(Request $request){ 
        $request->validate([
            'g-recaptcha-response' => 'required|captcha',
        ]); 
        $Password_reset =null;
        if($request->has("Usuario")  ){
            $email=$request->Usuario; 
            if(!strpos($email, '@') ){
                $email = User::where("Nombre_de_usuario",$email)->first();
                if($email) $email = $email->email;
            }else{
                $email = User::where("email",$email)->first();
                if($email) $email = $email->email;
            }
            if($email){    
                $user =  User::where("email",$email)->first();//com
                $Password_reset = $user->password_reset(); 
                if($Password_reset) $Password_reset->delete();
                $Password_reset = new password_resets();
                $Password_reset->token =  Str::random(15); 
                $user->password_reset()->save($Password_reset);
                $data =array (
                    'Codigo_Confirmacion'=>$Password_reset->token,
                    'Nombre'=>$user->Nombre_de_usuario,
                    'email'=>$user->email,
                );     
                Mail::to($user->email)->send(new  Recuperar_pass($data)); 
                $user->save();    
            }
        }
        if($Password_reset!==null)
            return view('Recuperar')->with("Recuperar","found");
        else
            return view('Recuperar')->with("Recuperar","not_found");
    }
    
    public function Recuperar_pass(){
        if (Auth::check()) return redirect("Usuario");
        
        return view("Recuperar");
    }
    public function Recuperar(string $codigo){
        if (Auth::check()) return redirect("Usuario");
        
        $token = password_resets::where("token",$codigo)->first();
        //      return dd($token);
        $user = $token->user; 
        $data = array(
            'token'=>$codigo,
            'Nombre'=>$user->name,
            'usuario'=>$user->Nombre_de_usuario,
            'Recuperar'=>"Codigo",
        );
        return view('Recuperar')->with($data);
    }
   public  function newpass(Request $request) {
        $this->validate($request, [
            'token'                     =>"required",
            'password'              => 'required|min:4|max:60',
            'password_confirmation' => 'required|same:password',
        ]);
        try{
        $token = password_resets::where("token",$request->token)->first();
        $user = $token->user; 
        $user->password_reset->delete();
        $user->password =  bcrypt($request->password);
        $user->save();
        }catch (Exception $e){   	
        }
        return redirect()->route("Login");   
   } 

   
}