<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $role1 = Role::create(['name' =>'autorizardores']);
        $role2 = Role::create(['name' =>'jefe']);
       

       Permission::create(['name' => 'solicitud'])->syncRoles([$role1, $role2]);
       Permission::create(['name' => 'proveedores'])->assignRole($role1);
       Permission::create(['name' => 'productos'])->assignRole($role1);
       Permission::create(['name' => 'especial'])->assignRole($role1);
     
    }
}
