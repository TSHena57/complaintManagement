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

            ['name' => 'academic-year-list','module' => 'General-Setup', 'sub_module' => 'academic-year','guard_name' => 'web', 'parent_menu' => 'Mutual Assesment'],
            ['name' => 'academic-year-create','module' => 'General-Setup', 'sub_module' => 'academic-year','guard_name' => 'web', 'parent_menu' => 'Mutual Assesment'],
            ['name' => 'academic-year-edit','module' => 'General-Setup', 'sub_module' => 'academic-year','guard_name' => 'web', 'parent_menu' => 'Mutual Assesment'],
            ['name' => 'academic-year-delete','module' => 'General-Setup', 'sub_module' => 'academic-year','guard_name' => 'web', 'parent_menu' => 'Mutual Assesment'],

            ['name' => 'academic-course-list','module' => 'General-Setup', 'sub_module' => 'academic-course','guard_name' => 'web', 'parent_menu' => 'Mutual Assesment'],
            ['name' => 'academic-course-create','module' => 'General-Setup', 'sub_module' => 'academic-course','guard_name' => 'web', 'parent_menu' => 'Mutual Assesment'],
            ['name' => 'academic-course-edit','module' => 'General-Setup', 'sub_module' => 'academic-course','guard_name' => 'web', 'parent_menu' => 'Mutual Assesment'],
            ['name' => 'academic-course-delete','module' => 'General-Setup', 'sub_module' => 'academic-course','guard_name' => 'web', 'parent_menu' => 'Mutual Assesment'],

            ['name' => 'academic-term-list','module' => 'General-Setup', 'sub_module' => 'academic-term','guard_name' => 'web', 'parent_menu' => 'Mutual Assesment'],
            ['name' => 'academic-term-create','module' => 'General-Setup', 'sub_module' => 'academic-term','guard_name' => 'web', 'parent_menu' => 'Mutual Assesment'],
            ['name' => 'academic-term-edit','module' => 'General-Setup', 'sub_module' => 'academic-term','guard_name' => 'web', 'parent_menu' => 'Mutual Assesment'],
            ['name' => 'academic-term-delete','module' => 'General-Setup', 'sub_module' => 'academic-term','guard_name' => 'web', 'parent_menu' => 'Mutual Assesment'],

            ['name' => 'division-list','module' => 'General-Setup', 'sub_module' => 'academic-division','guard_name' => 'web', 'parent_menu' => 'Mutual Assesment'],
            ['name' => 'division-create','module' => 'General-Setup', 'sub_module' => 'academic-division','guard_name' => 'web', 'parent_menu' => 'Mutual Assesment'],
            ['name' => 'division-edit','module' => 'General-Setup', 'sub_module' => 'academic-division','guard_name' => 'web', 'parent_menu' => 'Mutual Assesment'],
            ['name' => 'division-delete','module' => 'General-Setup', 'sub_module' => 'academic-division','guard_name' => 'web', 'parent_menu' => 'Mutual Assesment'],

            ['name' => 'syndicate-list','module' => 'General-Setup', 'sub_module' => 'syndicate-group','guard_name' => 'web', 'parent_menu' => 'Mutual Assesment'],
            ['name' => 'syndicate-create','module' => 'General-Setup', 'sub_module' => 'syndicate-group','guard_name' => 'web', 'parent_menu' => 'Mutual Assesment'],
            ['name' => 'syndicate-edit','module' => 'General-Setup', 'sub_module' => 'syndicate-group','guard_name' => 'web', 'parent_menu' => 'Mutual Assesment'],
            ['name' => 'syndicate-delete','module' => 'General-Setup', 'sub_module' => 'syndicate-group','guard_name' => 'web', 'parent_menu' => 'Mutual Assesment'],

            ['name' => 'evaluation-domain-list','module' => 'General-Setup', 'sub_module' => 'evaluation-domain','guard_name' => 'web', 'parent_menu' => 'Mutual Assesment'],
            ['name' => 'evaluation-domain-create','module' => 'General-Setup', 'sub_module' => 'evaluation-domain','guard_name' => 'web', 'parent_menu' => 'Mutual Assesment'],
            ['name' => 'evaluation-domain-edit','module' => 'General-Setup', 'sub_module' => 'evaluation-domain','guard_name' => 'web', 'parent_menu' => 'Mutual Assesment'],
            ['name' => 'evaluation-domain-delete','module' => 'General-Setup', 'sub_module' => 'evaluation-domain','guard_name' => 'web', 'parent_menu' => 'Mutual Assesment'],

            ['name' => 'city-list','module' => 'General-Setup', 'sub_module' => 'city','guard_name' => 'web', 'parent_menu' => 'Mutual Assesment'],
            ['name' => 'city-create','module' => 'General-Setup', 'sub_module' => 'city','guard_name' => 'web', 'parent_menu' => 'Mutual Assesment'],
            ['name' => 'city-edit','module' => 'General-Setup', 'sub_module' => 'city','guard_name' => 'web', 'parent_menu' => 'Mutual Assesment'],
            ['name' => 'city-delete','module' => 'General-Setup', 'sub_module' => 'city','guard_name' => 'web', 'parent_menu' => 'Mutual Assesment'],

            ['name' => 'rank-list','module' => 'General-Setup', 'sub_module' => 'rank','guard_name' => 'web', 'parent_menu' => 'Mutual Assesment'],
            ['name' => 'rank-create','module' => 'General-Setup', 'sub_module' => 'rank','guard_name' => 'web', 'parent_menu' => 'Mutual Assesment'],
            ['name' => 'rank-edit','module' => 'General-Setup', 'sub_module' => 'rank','guard_name' => 'web', 'parent_menu' => 'Mutual Assesment'],
            ['name' => 'rank-delete','module' => 'General-Setup', 'sub_module' => 'rank','guard_name' => 'web', 'parent_menu' => 'Mutual Assesment'],

            ['name' => 'appointment-list','module' => 'General-Setup', 'sub_module' => 'appointment','guard_name' => 'web', 'parent_menu' => 'Mutual Assesment'],
            ['name' => 'appointment-create','module' => 'General-Setup', 'sub_module' => 'appointment','guard_name' => 'web', 'parent_menu' => 'Mutual Assesment'],
            ['name' => 'appointment-edit','module' => 'General-Setup', 'sub_module' => 'appointment','guard_name' => 'web', 'parent_menu' => 'Mutual Assesment'],
            ['name' => 'appointment-delete','module' => 'General-Setup', 'sub_module' => 'appointment','guard_name' => 'web', 'parent_menu' => 'Mutual Assesment'],

            ['name' => 'event-list','module' => 'Peer-Assesment', 'sub_module' => 'event','guard_name' => 'web', 'parent_menu' => 'Mutual Assesment'],
            ['name' => 'event-create','module' => 'Peer-Assesment', 'sub_module' => 'event','guard_name' => 'web', 'parent_menu' => 'Mutual Assesment'],
            ['name' => 'event-edit','module' => 'Peer-Assesment', 'sub_module' => 'event','guard_name' => 'web', 'parent_menu' => 'Mutual Assesment'],
            ['name' => 'event-delete','module' => 'Peer-Assesment', 'sub_module' => 'event','guard_name' => 'web', 'parent_menu' => 'Mutual Assesment'],

            ['name' => 'assesment-setup-list','module' => 'Peer-Assesment', 'sub_module' => 'assesment-setup','guard_name' => 'web', 'parent_menu' => 'Mutual Assesment'],
            ['name' => 'assesment-setup-create','module' => 'Peer-Assesment', 'sub_module' => 'assesment-setup','guard_name' => 'web', 'parent_menu' => 'Mutual Assesment'],
            ['name' => 'assesment-setup-edit','module' => 'Peer-Assesment', 'sub_module' => 'assesment-setup','guard_name' => 'web', 'parent_menu' => 'Mutual Assesment'],
            ['name' => 'assesment-setup-show','module' => 'Peer-Assesment', 'sub_module' => 'assesment-setup','guard_name' => 'web', 'parent_menu' => 'Mutual Assesment'],
            ['name' => 'assesment-setup-delete','module' => 'Peer-Assesment', 'sub_module' => 'assesment-setup','guard_name' => 'web', 'parent_menu' => 'Mutual Assesment'],

            ['name' => 'assesment-evaluation-pending-list','module' => 'Peer-Assesment', 'sub_module' => 'assesment-evaluation','guard_name' => 'web', 'parent_menu' => 'Mutual Assesment'],
            ['name' => 'assesment-evaluation-submitted-list','module' => 'Peer-Assesment', 'sub_module' => 'assesment-evaluation','guard_name' => 'web', 'parent_menu' => 'Mutual Assesment'],
            ['name' => 'assesment-evaluation','module' => 'Peer-Assesment', 'sub_module' => 'assesment-evaluation','guard_name' => 'web', 'parent_menu' => 'Mutual Assesment'],
            ['name' => 'assesment-evaluation-show','module' => 'Peer-Assesment', 'sub_module' => 'assesment-evaluation','guard_name' => 'web', 'parent_menu' => 'Mutual Assesment'],

            ['name' => 'advance-assesment-report','module' => 'Analytics-Report', 'sub_module' => 'Analytics-Report','guard_name' => 'web', 'parent_menu' => 'Mutual Assesment'],

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
