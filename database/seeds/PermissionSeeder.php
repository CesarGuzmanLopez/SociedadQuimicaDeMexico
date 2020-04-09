<?php

use Illuminate\Database\Seeder;
use App\Models\Permission;


class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	$data = array(
    			array(
    					"name" => 'Ver Staff',
    					"slug" =>   'ver-staff', 
    			),
    			array(
    					"name" => 'Modificar Staff',
    					"slug" =>   'mod-staff', 
    			),
    			array(
    					"name" => 'Ver Usuarios',
    					"slug" =>   'ver-usuarios', 
    			),
    			array(
    					"name" => 'Modificar Usuarios',
    					"slug" =>   'mod-Usuarios',
    			),
    			array(
    					"name" => 'Ver Stock',
    					"slug" =>   'ver-stock', 
    			),
    			array(
    					"name" => 'Modificar Stock',
    					"slug" =>   'mod-stock',
    			),
    			array(
    					"name" => 'Ver Permisos',
    					"slug" =>   'ver-permisos', 
    			),
    			array(
    					"name" => 'Modificar permisos',
    					"slug" =>   'mod-permisos',
    			),
    			array(
    					"name" => 'Modificar membrecia',
    					"slug" =>   'mod-membrecia', 
    			),
    			array(
    					"name" => 'Modificar paginas',
    					"slug" =>   'Mod-paginas', 
    			),
    			array(
    					"name" => 'Administrador de eventos',
    					"slug" =>   'adm-eventos', 
    			),
    			array(
    					"name" => 'Creador de contenido',
    					"slug" =>   'creador-contenido', 
    			),
    			array(
    					"name" => 'Creador de paginas',
    					"slug" =>   'creador-paginas', 
    			),
    			array(
    					"name" => 'Usuario con membrecia',
    					"slug" =>   'usuario-membrecia', 
    			),
    			array(
    					"name" => 'Usuario',
    					"slug" =>   'usuario', 
    			),
    			array(
    					"name" => 'Acceder Permisos',
    					"slug" =>   'acceder-permisos', 
    			)
    	);
    	foreach($data as $dato){
    		$temp =new  Permission();
    		$temp->name=$dato['name'];
    		$temp->slug=$dato['slug'];
    		$temp->save();
    	}
    }
}
