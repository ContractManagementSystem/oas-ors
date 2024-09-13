<?php

namespace Database\Seeders;

use App\Models\Permission;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PermissionSeederTable extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $permissions = [
            [
                'id'    => 1,
                'title' => 'user_management_access',
            ],
            [
                'id'    => 2,
                'title' => 'permission_create',
            ],
            [
                'id'    => 3,
                'title' => 'permission_edit',
            ],
            [
                'id'    => 4,
                'title' => 'permission_show',
            ],
            [
                'id'    => 5,
                'title' => 'permission_delete',
            ],
            [
                'id'    => 6,
                'title' => 'permission_access',
            ],
            [
                'id'    => 7,
                'title' => 'role_create',
            ],
            [
                'id'    => 8,
                'title' => 'role_edit',
            ],
            [
                'id'    => 9,
                'title' => 'role_show',
            ],
            [
                'id'    => 10,
                'title' => 'role_delete',
            ],
            [
                'id'    => 11,
                'title' => 'role_access',
            ],
            [
                'id'    => 12,
                'title' => 'user_create',
            ],
            [
                'id'    => 13,
                'title' => 'user_edit',
            ],
            [
                'id'    => 14,
                'title' => 'user_show',
            ],
            [
                'id'    => 15,
                'title' => 'user_delete',
            ],
            [
                'id'    => 16,
                'title' => 'user_access',
            ],
            [
                'id'    => 17,
                'title' => 'audit_log_show',
            ],
            [
                'id'    => 18,
                'title' => 'audit_log_access',
            ],
            [
                'id'    => 19,
                'title' => 'application_create',
            ],
            [
                'id'    => 20,
                'title' => 'application_edit',
            ],
            [
                'id'    => 21,
                'title' => 'application_show',
            ],
            [
                'id'    => 22,
                'title' => 'application_delete',
            ],
            [
                'id'    => 23,
                'title' => 'application_access',
            ],
            [
                'id'    => 24,
                'title' => 'application_type_create',
            ],
            [
                'id'    => 25,
                'title' => 'application_type_evvvvdit',
            ],
            [
                'id'    => 26,
                'title' => 'application_type_show',
            ],
            [
                'id'    => 27,
                'title' => 'application_type_delete',
            ],
            [
                'id'    => 28,
                'title' => 'application_type_access',
            ],
            [
                'id'    => 29,
                'title' => 'department_create',
            ],
            [
                'id'    => 30,
                'title' => 'department_edit',
            ],
            [
                'id'    => 31,
                'title' => 'department_show',
            ],
            [
                'id'    => 32,
                'title' => 'department_delete',
            ],
            [
                'id'    => 33,
                'title' => 'department_access',
            ],
            [
                'id'    => 34,
                'title' => 'campus_create',
            ],
            [
                'id'    => 35,
                'title' => 'campus_edit',
            ],
            [
                'id'    => 36,
                'title' => 'campus_show',
            ],
            [
                'id'    => 37,
                'title' => 'campus_delete',
            ],
            [
                'id'    => 38,
                'title' => 'campus_access',
            ],
            [
                'id'    => 39,
                'title' => 'profile_password_edit',
            ],
            [
                'id'    => 40,
                'title' => 'intake_access',
            ],
            [
                'id'    => 41,
                'title' => 'intake_create',
            ],
            [
                'id'    => 42,
                'title' => 'intake_edit',
            ],
            [
                'id'    => 43,
                'title' => 'intake_show',
            ],
            [
                'id'    => 44,
                'title' => 'intake_delete',
            ],
            [
                'id'    => 45,
                'title' => 'programme_create',
            ],
            [
                'id'    => 46,
                'title' => 'programme_access',
            ],
            [
                'id'    => 47,
                'title' => 'programme_edit',
            ],
            [
                'id'    => 48,
                'title' => 'programme_delete',
            ],
            [
                'id'    => 49,
                'title' => 'programme_show',
            ],
        ];

        Permission::insert($permissions);
    }
}