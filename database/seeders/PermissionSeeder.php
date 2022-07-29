<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Spatie\Permission\Models\Permission;
use Illuminate\Database\Seeder;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       

        $permissions = [
            'permirssion_index',
            'permirssion_create',
            'permirssion_show',
            'permirssion_edit',
            'permirssion_destroy',

            'role_index',
            'role_create',
            'role_show',
            'role_edit',
            'role_destroy',

            'user_index',
            'user_create',
            'user_show',
            'user_edit',
            'user_destroy',

            'autorizadores_index',
            'autorizadores_show',
            'autorizadores_create',
            'autorizadores_edit',
            'autorizadores_destroy',

            'administrador_index',
            'administrador_show',
            'administrador_create',
            'administrador_edit',
            'administrador_destroy',

        ];
        foreach ($permissions as $permission) {
            Permission::create([
                'name' => $permission
            ]);
           
        }
    }
}








