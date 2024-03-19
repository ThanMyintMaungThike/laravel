<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class RoleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // $data = [
        //     [
        //         'name' => 'Super Admin',
        //         'guard_name'
        //     ],
        //     [
        //         'name' => 'Manager'
        //     ],
        //     [
        //         'name' => 'Editor'
        //     ]
        // ];

        // Role::insert($data);

        Role::create(['name' => 'super admin']);
        Role::create(['name' => 'manager']);
        Role::create(['name' => 'editor']);
    }
}
