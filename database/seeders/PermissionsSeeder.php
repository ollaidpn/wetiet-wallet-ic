<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\PermissionRegistrar;

class PermissionsSeeder extends Seeder
{
    public function run()
    {
        // Reset cached roles and permissions
        app()[PermissionRegistrar::class]->forgetCachedPermissions();

        // Create default permissions
        Permission::create(['name' => 'list settings']);
        Permission::create(['name' => 'view settings']);
        Permission::create(['name' => 'create settings']);
        Permission::create(['name' => 'update settings']);
        Permission::create(['name' => 'delete settings']);

        Permission::create(['name' => 'list transferts']);
        Permission::create(['name' => 'view transferts']);
        Permission::create(['name' => 'create transferts']);
        Permission::create(['name' => 'update transferts']);
        Permission::create(['name' => 'delete transferts']);

        Permission::create(['name' => 'list tokenizers']);
        Permission::create(['name' => 'view tokenizers']);
        Permission::create(['name' => 'create tokenizers']);
        Permission::create(['name' => 'update tokenizers']);
        Permission::create(['name' => 'delete tokenizers']);

        Permission::create(['name' => 'list transactions']);
        Permission::create(['name' => 'view transactions']);
        Permission::create(['name' => 'create transactions']);
        Permission::create(['name' => 'update transactions']);
        Permission::create(['name' => 'delete transactions']);

        Permission::create(['name' => 'list shops']);
        Permission::create(['name' => 'view shops']);
        Permission::create(['name' => 'create shops']);
        Permission::create(['name' => 'update shops']);
        Permission::create(['name' => 'delete shops']);

        Permission::create(['name' => 'list refuelings']);
        Permission::create(['name' => 'view refuelings']);
        Permission::create(['name' => 'create refuelings']);
        Permission::create(['name' => 'update refuelings']);
        Permission::create(['name' => 'delete refuelings']);

        Permission::create(['name' => 'list favorites']);
        Permission::create(['name' => 'view favorites']);
        Permission::create(['name' => 'create favorites']);
        Permission::create(['name' => 'update favorites']);
        Permission::create(['name' => 'delete favorites']);

        // Create user role and assign existing permissions
        $currentPermissions = Permission::all();
        $userRole = Role::create(['name' => 'user']);
        $userRole->givePermissionTo($currentPermissions);

        // Create admin exclusive permissions
        Permission::create(['name' => 'list roles']);
        Permission::create(['name' => 'view roles']);
        Permission::create(['name' => 'create roles']);
        Permission::create(['name' => 'update roles']);
        Permission::create(['name' => 'delete roles']);

        Permission::create(['name' => 'list permissions']);
        Permission::create(['name' => 'view permissions']);
        Permission::create(['name' => 'create permissions']);
        Permission::create(['name' => 'update permissions']);
        Permission::create(['name' => 'delete permissions']);

        Permission::create(['name' => 'list users']);
        Permission::create(['name' => 'view users']);
        Permission::create(['name' => 'create users']);
        Permission::create(['name' => 'update users']);
        Permission::create(['name' => 'delete users']);

        // Create admin role and assign all permissions
        $allPermissions = Permission::all();
        $adminRole = Role::create(['name' => 'super-admin']);
        $adminRole->givePermissionTo($allPermissions);

        $user = \App\Models\User::whereEmail('admin@admin.com')->first();

        if ($user) {
            $user->assignRole($adminRole);
        }
    }
}
