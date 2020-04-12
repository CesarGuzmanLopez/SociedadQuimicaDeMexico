<?php

use Illuminate\Database\Seeder;
use App\Models\CodigoPostal;

class CodigoPostalseeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	$fp = fopen(base_path()."/database/seeds/MX.txt", "r");
	    $u=0;
	    	while (!feof($fp)){
	    		$linea = fgets($fp);
	    		$separado  =explode("\t",$linea) ;
	    		$cp =  new CodigoPostal();
	    		$cp->Pais = $separado[0];
	    		$cp->Codigo_Postal = $separado[1];
	    		$cp->Colonia = $separado[2];
	    		$cp->Estado =$separado[3];
	    		$cp->Comunidad= $separado[5];
	    		$cp->Municipio =  $separado[7];
	    		$cp->longitud =$separado[9];
	    		$cp->latitud =$separado[10];
	    		$cp->occuracy =$separado[11];
	    		$cp->save();
	    		$u++;
	    		if($u>200) 	break;
	   	 	}
    }
}
