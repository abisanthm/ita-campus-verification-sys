<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Spatie\Permission\Models\Permission;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $permissions = [
            ['name' => 'create-role', 'display_name' => 'Create Role', 'category' => 'Role'],
            ['name' => 'edit-role', 'display_name' => 'Edit Role', 'category' => 'Role'],
            ['name' => 'delete-role', 'display_name' => 'Delete Role', 'category' => 'Role'],
            ['name' => 'create-user', 'display_name' => 'Create User', 'category' => 'User'],
            ['name' => 'edit-user', 'display_name' => 'Edit User', 'category' => 'User'],
            ['name' => 'delete-user', 'display_name' => 'Delete User', 'category' => 'User'],
            ['name' => 'edit-value', 'display_name' => 'Edit Value', 'category' => 'Value'],
            ['name' => 'show-user-log', 'display_name' => 'Show User Log', 'category' => 'User Logs'],
            ['name' => 'edit-mail', 'display_name' => 'Edit Mail', 'category' => 'Mail'],
            ['name' => 'edit-certificate-setting', 'display_name' => 'Edit Certificate Setting', 'category' => 'Certificate Setting'],
            ['name' => 'edit-setting', 'display_name' => 'Edit Setting', 'category' => 'Setting'],
            ['name' => 'create-program', 'display_name' => 'Create Program', 'category' => 'Program'],
            ['name' => 'edit-program', 'display_name' => 'Edit Program', 'category' => 'Program'],
            ['name' => 'delete-program', 'display_name' => 'Delete Program', 'category' => 'Program'],
            ['name' => 'create-program-type', 'display_name' => 'Create Program Type', 'category' => 'Program Type'],
            ['name' => 'edit-program-type', 'display_name' => 'Edit Program Type', 'category' => 'Program Type'],
            ['name' => 'delete-program-type', 'display_name' => 'Delete Program Type', 'category' => 'Program Type'],
            ['name' => 'create-student', 'display_name' => 'Create Student', 'category' => 'Student'],
            ['name' => 'edit-student', 'display_name' => 'Edit Student', 'category' => 'Student'],
            ['name' => 'delete-student', 'display_name' => 'Delete Student', 'category' => 'Student'],
        ];
        


        // Looping and Inserting Permissions into Permission Table
        foreach ($permissions as $permission) {
            Permission::create([
                'name' => $permission['name'],
                'display_name' => $permission['display_name'],
                'category' => $permission['category'],
            ]);
        }
    }
}
