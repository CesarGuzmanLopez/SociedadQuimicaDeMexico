<?php

namespace app\Http\Controllers\Membresia;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Membresia;

/**
 *
 * @author 88-8
 *   
 */
class MembresiaController extends Controller {

	public function __construct() {	
		
	}
	public  function index() {
		$membresias = Membresia::get();
		$usuarios = User::get();
		$data = array(
				"Membresias"=> $membresias,
				"Usuarios"=> $usuarios,
				);
		return view("administrarMembresia.Membresia")->with($data);
	}
}

