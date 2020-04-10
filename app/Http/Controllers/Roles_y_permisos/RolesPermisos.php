<?php
namespace app\Http\Controllers\Roles_y_permisos;

use App\Http\Controllers\Controller;
use App\Models\Permission;
use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
/**
 *
 * @author Cesar gerardo Guzman Lopez
 *        
 */
class RolesPermisos extends Controller
{ 
    /**
     * 
     * @return Object
     */
    public function __construct()
    {      }
     /**
      * 
      * @return \Illuminate\View\View|\Illuminate\Contracts\View\Factory
      */
     public function index(){
     	;
     	return view("RolesPermisos");
     } 
     /**
      *
      */
     public function AgregarPermiso(){
     	$Permisos =  Permission::get();
     	return view("RolesPermisos.AgregarPermiso")->with("Permisos",$Permisos);
     }
     /**
      * 
      * @return \Illuminate\View\View|\Illuminate\Contracts\View\Factory
      */
   	public function AgregarRol(){
   		$Roles =  Role::get();
   		return view("RolesPermisos.AgregarRol")->with("Roles",$Roles);
   	}
   	/**
   	 * 
   	 * @return \Illuminate\View\View|\Illuminate\Contracts\View\Factory
   	 */
	public function AgregarPermisoARol(){
		$Roles =  Role::get();; 
		return view("RolesPermisos.AgregarPermisoARol")->with("Roles",$Roles);
	}
	
	public function AgregarPermisoARolID(Request $request, int $id){
		$Role =Role::where("id",$id)->first();
		$Permisos = Permission::get();
		$data = array(
				'Role'      =>  $Role,
				'Permisos'=>$Permisos,
		);
		return view("RolesPermisos.AgregarPermisoARolID")->with($data);
	}
	public function AgregarPermisoAUsuario(){
		$Usuarios =User::get();
		return view("RolesPermisos.AgregarPermisoAUsuario")->with("Usuarios",$Usuarios);
	}
	public function AgregarPermisoAUsuarioID(Request $request, int $id){
		$Usuario =User::where("id",$id)->first();
		$Permisos = Permission::get();
		$data = array(
				'Usuario'      => $Usuario,
				'Permisos'=>$Permisos,
		);
		return view("RolesPermisos\AgregarPermisoAUsuarioID")->with($data);
	}
	
    public function AgregarRolAUsuario(){
    	$Usuarios =User::get();
    	return view("RolesPermisos.AgregarRolAUsuario")->with("Usuarios",$Usuarios);
    	
    }
    public function AgregarRolAUsuarioID(Request $request, int $id){
    	$Usuario =User::where("id",$id)->first();
    	$Permisos = Role::get();
    	$data = array(
    			'Usuario'      =>  $Usuario,
    			'Roles'=>$Permisos,
    	);
    	return view("RolesPermisos.AgregarRolAUsuarioID")->with($data);
    } 
    public function CrudRolesYUsuario(){
    	$Usuarios = User::get();
    	$Roles=Role::get();
    	$Permisos = permission::get();
    	$data = array(
    		'Usuarios' =>$Usuarios,
    		'Roles'=>$Roles,
    		'Permisos'=>$Permisos,
    	);
    	return view("RolesPermisos.CrudRolesYUsuario")->with($data);
    }
    
    /**
     * 
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function AgregarRolPost(Request $request){
    	$this->validate($request, [
    			'name'                  => 'required|string|min:3|max:35',
    			'slug'=>"alpha_dash|nullable",
    			'Valor'=>"required|unique:roles|integer",
    	]);
    	$Rol = new Role($request->all());
    	$Rol->save(); 
    	return back();
    } 
    /**
     * 
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function AgregarPermisoPost(Request $request){
    	$this->validate($request, [
    			'name'                  => 'required|string|min:3|max:35',
    			'slug'=>"alpha_dash|nullable",
    	]);
    	$Permisos = new Permission($request->all());
    	$Permisos->save();
    	
    	return back();
    }

    public function ActualizarEliminarPermiso( Request $request){
    	$this->validate($request, [
    			'name'	=> 'required|string|min:3|max:35',
    			'slug'	=>"alpha_dash|nullable",
    			'accion'=>"required",
    			'id'=>"required",
    	]);
    	$Permiso = Permission::where("id",$request->id)->first();
    	switch ($request->accion){
    		case 'cambiar':
    			$Permiso->slug = $request->slug;
    			$Permiso->name = $request->name;
    			$Permiso->save();
    			break; 
    		case 'eliminar':
    			$Permiso->delete();
    			break;
    	} 
    	return back(); 
    }
    /**
     * 
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    
    public function ActualizarEliminarRol( Request $request){
    	$this->validate($request, [
    			'name'	=> 'required|string|min:3|max:35',
    			'slug'	=>"alpha_dash|nullable",
    			'Valor'=>"required|integer",
    			'accion'=>"required",
    			'id'=>"required",
    	]);
    	$Rol = Role::where("id",$request->id)->first();
    	switch ($request->accion){
    		case 'cambiar':
    			$Rol->slug = $request->slug;
    			$Rol->name = $request->name;
    			$Rol->Valor =$request->Valor;
    			$Rol->save();
    			break;
    		case 'eliminar':
    			$Rol->delete();
    			break;
    	}
    	return back();
    }
    public function AgregarPermisoARol_post(Request $Request){
    	$Role =Role::where("id",$Request->RoleID)->first();
    	if($Role->permissions())
    	$Role->permissions()->detach();
    	
    	if( $Request->Permisos )
    	foreach ( $Request->Permisos as $Permiso ){
    		$Role->permissions()->attach($Permiso);
    	} 
    	return redirect()->route("RolesPermisos/AgregarPermisoARol") ;
    }
    public function AgregarPermisoAUsuario_post(Request $Request){
    	$Usuario =User::where("id",$Request->UserID)->first();
 	  	$Usuario->permissions()->detach();
    	if( $Request->Permisos )
    		foreach ( $Request->Permisos as $Permiso ){
    			$Usuario->permissions()->attach($Permiso);
    	}
    	return redirect()->route("RolesPermisos/AgregarPermisoAUsuario") ;
    }
    public function AgregarRolAUsuario_post(Request $Request){
    	$Usuario =User::where("id",$Request->UserID)->first();
    	$Usuario->roles()->detach();
    	if( $Request->Roles )
    		foreach ( $Request->Roles as $Permiso ){
    			$Usuario->roles()->attach($Permiso);
    	}
    	return redirect()->route("RolesPermisos/AgregarRolAUsuario") ;
    }
    public function CrudRolesYUsuarioPost(Request $Request){
    	
    	switch ($Request->Modificar){
    	case 'role':
    		$Role =Role::where("id",$Request->id_Role)->first();
    		if($Role->permissions())
    			$Role->permissions()->detach();
    			
    		if( $Request->Permisos )
    			foreach ( $Request->Permisos as $Permiso ){
   					$Role->permissions()->attach($Permiso);
   			} 
  			$Role->save();  			
    		break;
    	case 'Usuario':
    		$Usuario =User::where("id",$Request->id_Usuario)->first();
    		$Usuario->roles()->detach();
    		if( $Request->Roles )
    			foreach ( $Request->Roles as $Permiso ){
    				$Usuario->roles()->attach($Permiso);
    		}
    		$Usuario->permissions()->detach();
    		if( $Request->Permisos )
    			foreach ( $Request->Permisos as $Permiso ){
    				$Usuario->permissions()->attach($Permiso);
    		}
    		$Usuario->save();
    		break;
    	}
    	return back();
    }
}