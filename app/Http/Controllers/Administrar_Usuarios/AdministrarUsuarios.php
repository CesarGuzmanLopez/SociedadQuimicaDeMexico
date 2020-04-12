<?php

namespace app\Http\Controllers\Administrar_Usuarios;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use App\Models\Role; 
/**
 *
 * @author 88-8
 *        
 */
class AdministrarUsuarios extends Controller {

	
	public function __construct() {}
	/**
	 * 
	 * @return \Illuminate\View\View|\Illuminate\Contracts\View\Factory
	 */
	public  function  index(){
		$usuarios = User::get();
		$roles =  Role::get();
		
		$data =array(
				"Usuarios"=>$usuarios,
				"Roles"	 =>$roles,
		);
		return view("AdministrarUsuarios")->with($data);
	}
	public function modificar(Request $request, string $id) {
		$Usuario = User::find($id);
		$roles =  Role::get(); 
		$data =array(
				"Usuario"=>$Usuario,
				"Roles"	 =>$roles,
		);
		return view("AdministrarUsuarios.modificar")->with($data);
		
	}
	public  function agregarUsuario(){
		$roles =  Role::get();
		return view("AdministrarUsuarios.agregarUsuario")->with("Roles",$roles); 
	}
	public function modificarPost(Request $request){
		$this->validate($request, [
				'id'							=>   'required',
				'name'                  => 'required|string|min:3|max:35',
				'email'                 => 'required|email|min:3|max:35',
				'url_Pagina_Personal'=>"active_url|nullable",
				'Nombre_de_usuario'=>"alpha_dash|nullable",
		]);
		
		$user = User::where("id",$request->id)->first();
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
			$user->Grado_Academico = $request->Grado_Academico;
			$path = $user->path_Image;
			if($request->hasFile("Imagen"))
					$path = $request->file('Imagen')->store('public/Usuarios/'.$user->id."/");					
			$user->path_Image = $path;
			$user->save();
			$user->roles()->detach($user->roles()->first()->id);
			$user->roles()->attach($request->Role);
			
			$user->password = bcrypt($request->Password);
			return redirect()->route("AdministrarUsuarios/"); 
	}
	public function  agregarPost(Request $request){
		$this->validate($request, [
				'name'                  => 'required|string|min:3|max:35',
				'email'                 => 'required|email|min:3|max:35|unique:users',
				'Nombre_de_usuario'=>"alpha_dash|nullable|unique:users",
				'Password'=>"required",
				
		]);
		$usuario = new User($request->all());
		$usuario->password = bcrypt($request->Password);
		$usuario->save();;
		$usuario->roles()->attach($request->Role);
		return redirect()->route("AdministrarUsuarios/");
	}
}

