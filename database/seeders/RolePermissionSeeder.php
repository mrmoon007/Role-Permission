<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RolePermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Role Create
        $role_super_admin = Role::create(['name' => 'super_admin']);
        $role_admin = Role::create(['name' => 'admin']);
        $role_editor = Role::create(['name' => 'editor']);
        $role_user = Role::create(['name' => 'user']);

        // Permission 
        $permissions = [

            //dashboard
            'dashboard.view',

            //admin permission
            'admin.create',
            'admin.edit',
            'admin.view',
            'admin.delete',

            //blog permission
            'blog.create',
            'blog.edit',
            'blog.view',
            'blog.delete',
            'blog.approve',

            //role permission
            'role.create',
            'role.edit',
            'role.view',
            'role.delete',

            //profile permission
            'profile.edit',
            'profile.view',
            
        ];

        // Create and assign permission

        for ($i=0; $i < count($permissions) ; $i++) { 

            // Permission create
            $permission = Permission::create(['name' => $permissions[$i]]);

            $role_super_admin->givePermissionTo($permission);
            $permission->assignRole($role_super_admin);
        }

    }
}
