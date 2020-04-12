<?php

use Illuminate\Database\Seeder;

use App\Models\Role;
use App\Models\Permission;

class RoleSeeder extends Seeder
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
    					"name" => 'ROOT',
    					"slug" =>   'root',
    			),
    			array(
    					"name" => 'Administrador',
    					"slug" =>   'administrador',
    			),
    			array(
    					"name" => 'Programador',
    					"slug" =>   'programador',
    			),
    			array(
    					"name" => 'Delineante',
    					"slug" =>   'delineante',
    			),
    			array(
    					"name" => 'Diseñador',
    					"slug" =>   'diseñador',
    			),
    			array(
    					"name" => 'Administrador Usuarios',
    					"slug" =>   'adm-Usuarios',
    			), 
    			array(
    					"name" => 'Gerente',
    					"slug" =>   'gerente',
    			),
    			array(
    					"name" => 'Secretaria',
    					"slug" =>   'secretaria',
    			),
    			array(
    					"name" => 'Administrador tienda',
    					"slug" =>   'adm-tienda',
    			),
    			array(
    					"name" => 'Administrador de permisos',
    					"slug" =>   'adm-permisos',
    			),
    			array(
    					"name" => 'Administrador de membresia',
    					"slug" =>   'adm-membresia',
    			),
    			array(
    					"name" => 'Administrador de paginas',
    					"slug" =>   'adm-paginas',
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
    					"name"=>'STAFF',
    					"slug"=>'staff'
    			),
    			array(
    					"name" => 'Usuario con membrecia',
    					"slug" =>   'usuario-membrecia', 
    			),
    			array(
    					"name" => 'Usuario',
    					"slug" =>   'usuario',
    	
    			),
    	); 
    	
    	
    	$i=0;
    	foreach($data as $dato){
    		$i++;
    		$temp =new  Role();
    		$temp->Valor = $i;
    		$temp->name=$dato['name'];
    		$temp->slug=$dato['slug'];
    		$temp->save();
     	}
    	$temp = Role::find(1);
    	$Permisos =  Permission::get();
    	foreach( $Permisos as $Permiso){
    		$temp->permissions()->attach($Permiso->id);
    	}
    	/*
    	 $manager = new Role();
    	 $manager->name = 'Project Manager';
    	 $manager->slug =    'project-manager';
    	 $manager->save();
    	 
    	 $developer = new Role();
    	 $developer->name = 'Web Developer';
    	 $developer->slug = 'web-developer';
    	 $developer->save();
    	 */
    }
}
