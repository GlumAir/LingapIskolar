<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // 1. Admin user
        $admin = User::create([
            "name" => "System Administrator",
            "email" => "admin@example.com",
            "password" => bcrypt("password"), // might change in production, but as of now let's leave it at that :>
        ]);
        $admin->assignRole("admin");

        // 2. Support Manager user
        $manager = User::create([
            "name" => "Support Manager",
            "email" => "manager@example.com",
            "password" => bcrypt("password"), // might change in production, but as of now let's leave it at that :>
        ]);
        $manager->assignRole("support-manager");

        // 3. Support Agent user
        $agent = User::create([
            "name" => "Support Agent",
            "email" => "agent@example.com",
            "password" => bcrypt("password"), // might change in production, but as of now let's leave it at that :>
        ]);
        $agent->assignRole("agent");

        // 4. Regular User
        $user = User::create([
            "name" => "Test User",
            "email" => "user@example.com",
            "password" => bcrypt("password"), // might change in production, but as of now let's leave it at that :>
        ]);
        $user->assignRole("user");
    }
}
