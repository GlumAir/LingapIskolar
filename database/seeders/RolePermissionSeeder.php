<?php


namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RolePermissionSeeder extends Seeder
{
    public function run(): void
    {
        // Reset cached roles and permissions
        app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();

        // Create permissions
        $permissions = [
            // Ticket permissions
            'view-own-tickets',
            'view-assigned-tickets',
            'view-all-tickets',
            'create-tickets',
            'update-own-tickets',
            'update-assigned-tickets',
            'update-any-ticket',
            'delete-tickets',
            
            // Message permissions
            'add-public-messages',
            'add-internal-notes',
            'view-internal-notes',
            
            // Assignment permissions
            'assign-tickets',
            'reassign-tickets',
            'escalate-tickets',
            
            // Status/Priority permissions
            'update-ticket-status',
            'update-ticket-priority',
            
            // Admin permissions
            'manage-users',
            'manage-roles',
            'manage-permissions',
            'manage-categories',
            'manage-statuses',
            'manage-priorities',
            'manage-settings',
            'view-activity-logs',
            'view-reports',
            'manage-agents',
        ];

        foreach ($permissions as $permission) {
            Permission::create(['name' => $permission]);
        }

        // Create roles and assign permissions
        
        // 1. ADMIN - Full system access
        $admin = Role::create(['name' => 'admin']);
        $admin->givePermissionTo(Permission::all());

        // 2. SUPPORT MANAGER - Manages team and all tickets
        $manager = Role::create(['name' => 'support-manager']);
        $manager->givePermissionTo([
            'view-all-tickets',
            'create-tickets',
            'update-any-ticket',
            'assign-tickets',
            'reassign-tickets',
            'escalate-tickets',
            'update-ticket-status',
            'update-ticket-priority',
            'add-public-messages',
            'add-internal-notes',
            'view-internal-notes',
            'view-activity-logs',
            'view-reports',
            'manage-agents',
        ]);

        // 3. AGENT - Works on assigned tickets only
        $agent = Role::create(['name' => 'agent']);
        $agent->givePermissionTo([
            'view-assigned-tickets',
            'update-assigned-tickets',
            'update-ticket-status',
            'update-ticket-priority',
            'add-public-messages',
            'add-internal-notes',
            'view-internal-notes',
            'view-activity-logs',
        ]);

        // 4. USER - Basic ticket submission and viewing
        $user = Role::create(['name' => 'user']);
        $user->givePermissionTo([
            'view-own-tickets',
            'create-tickets',
            'add-public-messages',
        ]);
    }
}