<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RolePermissionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $adminPermission = Permission::whereIn('name',[
            'dashboard','role_list','role_create','role_edit', 'role_delete', 'permission_list','permission_create','permission_edit', 'permission_delete', 'category_list','category_edit','category_create', 'category_delete', 'user_list', 'user_create', 'user_edit', 'user_delete',
        ])->pluck('name');

        $role1 = Role::find(1);

        $role1->syncPermissions($adminPermission);

        $managerPermission = Permission::whereIn('name',[
            'dashboard','category_list','category_edit','category_create','category_delete',
        ])->pluck('name');

        $role2 = Role::find(2);
        $role2->syncPermissions($managerPermission);

        $editorPermission = Permission::whereIn('name',[
            'dashboard','category_list'
        ])->pluck('name');

        $role3 = Role::find(3);
        $role3->syncPermissions($editorPermission);

    }
}
