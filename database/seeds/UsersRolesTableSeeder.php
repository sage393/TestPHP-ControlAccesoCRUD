<?php

use Illuminate\Database\Seeder;
use App\Role;
use App\User;

class UsersRolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // All roles
        $admin_role = Role::where('slug', 'admin')->first();
        $guest_role = Role::where('slug', 'guest')->first();
        $editor_role = Role::where('slug', 'editor')->first();

        // All users
        $sam = User::where('email', 'sage393@gmail.com')->first();
        $admin = User::where('email', 'admin@gmail.com')->first();
        $editor = User::where('email', 'editor@gmail.com')->first();
        $guest = User::where('email', 'guest@gmail.com')->first();

        // Setting up roles and users
        $sam->roles()->attach($admin_role->id);
        $editor->roles()->attach($editor_role->id);
        $admin->roles()->attach($admin_role->id);
        $guest->roles()->attach($guest_role->id);
    }
}
