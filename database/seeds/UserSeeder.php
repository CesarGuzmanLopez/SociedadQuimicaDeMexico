<?php

use Illuminate\Database\Seeder;
use App\Models\Role;
use App\User;
use App\Models\Permission;


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
  
            $developer = Role::where('slug','web-developer')->first();
            $manager = Role::where('slug', 'project-manager')->first();
            $createTasks = Permission::where('slug','create-tasks')->first();
            $manageUsers = Permission::where('slug','manage-users')->first();
            
            $user0 = new User();
            $user0->name = 'Cesar';
            
            $user0->email = 'admin@admin.com';
            $user0->Nombre_de_usuario="Cesar_G";
            $user0->password = bcrypt('password');
            $user0->name="";
            $user0->save();
            $user0->roles()->attach($developer);
            $user0->permissions()->attach($createTasks);
            
            
            $user1 = new User();
            $user1->name = 'Jhon Deo';
            $user1->email = 'jhon@deo.com';
            $user1->password = bcrypt('secret');
            $user1->save();
            $user1->roles()->attach($developer);
            $user1->permissions()->attach($createTasks);
 
            $user2 = new User();
            $user2->name = 'Mike Thomas';
            $user2->email = 'mike@thomas.com';
            $user2->password = bcrypt('secret');
            $user2->save();
            $user2->roles()->attach($manager);
            $user2->permissions()->attach($manageUsers);
    }
}
