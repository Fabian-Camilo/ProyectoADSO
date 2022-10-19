<?php

namespace Database\Seeders;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

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
        $role_super_admin = Role::create(['name' => 'SuperAdmin']);
        $role_admin = Role::create(['name' => 'Admin']);
        $role_assistant = Role::create(['name' => 'Assistant']);

        $super_admin_permissions =
        [
            'view users',
            'create users',
            'update users',
            'delete users',

            'view subscriptions',
            'create subscriptions',
            'update subscriptions',
            'delete subscriptions',

            'view plans',
            'create plans',
            'update plans',
            'delete plans',

            'view companies',
            'create companies',
            'update companies',
            'delete companies',

            'view certificates',
            'create certificates',
            'update certificates',
            'delete certificates'
        ];
        $admin_permissions =
        [
            'view users',
            'create users',
            'update users',
            'delete users',

            'view subscriptions',
            'create subscriptions',

            'view plans',

            'view certificates',
            'create certificates',
            'update certificates',
            'delete certificates'
        ];
        $assistant_permissions =
        [
            'view certificates',
            'create certificates',
            'update certificates'
        ];

        foreach ($super_admin_permissions as $key => $permission) {
            Permission::create(['name' => $permission])->assignRole($role_super_admin);
        }
        foreach ($admin_permissions as $key => $permission) {
            Permission::where('name' , $permission)->first()->assignRole($role_admin);
        }
        foreach ($assistant_permissions as $key => $permission) {
            Permission::where('name' , $permission)->first()->assignRole($role_assistant);
        }
    }
}
