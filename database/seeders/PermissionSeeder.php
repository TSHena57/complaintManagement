<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $permissions = [

            ['name' => 'city-list','module' => 'General-Setup', 'sub_module' => 'city','guard_name' => 'web', 'parent_menu' => 'Mutual Assesment'],
            ['name' => 'city-create','module' => 'General-Setup', 'sub_module' => 'city','guard_name' => 'web', 'parent_menu' => 'Mutual Assesment'],
            ['name' => 'city-edit','module' => 'General-Setup', 'sub_module' => 'city','guard_name' => 'web', 'parent_menu' => 'Mutual Assesment'],
            ['name' => 'city-delete','module' => 'General-Setup', 'sub_module' => 'city','guard_name' => 'web', 'parent_menu' => 'Mutual Assesment'],

            ['name' => 'User-list','module' => 'System-Settings', 'sub_module' => 'User','guard_name' => 'web', 'parent_menu' => 'Mutual Assesment'],
            ['name' => 'User-create','module' => 'System-Settings', 'sub_module' => 'User','guard_name' => 'web', 'parent_menu' => 'Mutual Assesment'],
            ['name' => 'User-edit','module' => 'System-Settings', 'sub_module' => 'User','guard_name' => 'web', 'parent_menu' => 'Mutual Assesment'],
            ['name' => 'User-show','module' => 'System-Settings', 'sub_module' => 'User','guard_name' => 'web', 'parent_menu' => 'Mutual Assesment'],
            ['name' => 'User-delete','module' => 'System-Settings', 'sub_module' => 'User','guard_name' => 'web', 'parent_menu' => 'Mutual Assesment'],

            ['name' => 'role-list','module' => 'System-Settings', 'sub_module' => 'role','guard_name' => 'web', 'parent_menu' => 'Mutual Assesment'],
            ['name' => 'role-create','module' => 'System-Settings', 'sub_module' => 'role','guard_name' => 'web', 'parent_menu' => 'Mutual Assesment'],
            ['name' => 'role-edit','module' => 'System-Settings', 'sub_module' => 'role','guard_name' => 'web', 'parent_menu' => 'Mutual Assesment'],
            ['name' => 'role-permission','module' => 'System-Settings', 'sub_module' => 'role','guard_name' => 'web', 'parent_menu' => 'Mutual Assesment'],
        ];


        foreach ($permissions as $permission) {

            Permission::create($permission);

        }

        $role = Role::first();
        $role->syncPermissions(Permission::all());

        $user = User::find(1);
        $user->syncRoles([$role->name]);
    }
}
