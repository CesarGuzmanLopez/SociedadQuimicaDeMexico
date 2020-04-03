<?php
namespace app\Http\Controllers\Sesion;

use App\Http\Controllers\Controller;
 
/**
 *
 * @author Cesar Gerardo Guzman Lopez
 *        
 */
class SesionController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return object
     */
    
    public function __construct(){}
    
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view("Usuario" );
    }
}

