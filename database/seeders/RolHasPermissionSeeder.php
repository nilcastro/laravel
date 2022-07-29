<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;



class RolHasPermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // admin
        $admin_permissions = permission::all();
        Role::findOrFail(1)->permissions()->sync($admin_permissions->pluck('id'));

        // user
        $user_permissions = $admin_permissions->filter(function($permission){
            return substr($permission->name,0,5) != 'user_' && 
             substr($permission->name,0,5) != 'role_'  &&
             substr($permission->name,0,11) != 'permission_' &&
             substr($permission->name,0,14) != 'administrador_'&&
             substr($permission->name,0,14) != 'autorizadores_'  ;
          
        });
        Role::findOrFail(2)->permissions()->sync($user_permissions);
        
        //jefe
        $jefe_permissions = $admin_permissions->filter(function($permission){
            return substr($permission->name,0,5) != 'user_' ;
            
    });
        Role::findOrFail(3)->permissions()->sync($jefe_permissions);
}

}