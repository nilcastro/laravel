<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RolSeeder extends Seeder
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
       $role3 = Role::create(['name' =>'solicitante']);
       $role4 = Role::create(['name' =>'profesionales']);


       Permission::create(['name' =>'Ver solicitud']);
       Permission::create(['name' =>'Ver proveedores']);
       Permission::create(['name' =>'Ver productos']);
       Permission::create(['name' =>'Ver especiales']);
       Permission::create(['name' =>'Ver solicitud']);
    }
}
