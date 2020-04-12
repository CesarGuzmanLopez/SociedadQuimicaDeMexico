<?php

use Illuminate\Database\Seeder;
use App\Models\Role;
use App\Models\User;


class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        /**
         * Run the database seeds.
         *
         * @return void
         */ 
            $root = Role::where('slug','root')->first();
            $user0 = new User();
            $user0->name = 'Cesar'; 
            $user0->email = 'admin@admin.com';
            $user0->Nombre_de_usuario="Cesar_G";
            $user0->password = bcrypt('password');
            $user0->save();
            $user0->roles()->attach($root);
            $user0->save();
            
   }
}
