<?php

use Illuminate\Database\Seeder;
use App\Permission;
use App\Role;

class RolesPermissionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // All roles
        $administrator_role = Role::where('slug', 'admin')->first();
        $guest_role = Role::where('slug', 'guest')->first();
        $editor_role = Role::where('slug', 'editor')->first();

        // All permissions
        $see_permission = Permission::where('slug', 'see')->first();
        $edit_permission = Permission::where('slug', 'edit')->first();
        $create_permission = Permission::where('slug', 'create')->first();
        $delete_perission = Permission::where('slug', 'delete')->first();

        // Setting up permissions and roles
        $administrator_role->permissions()->attach([
        	$see_permission->id, 
        	$edit_permission->id, 
        	$create_permission->id, 
        	$delete_perission->id,
        ]);

        $guest_role->permissions()->attach($see_permission->id);

        $editor_role->permissions()->attach([
        	$see_permission->id,
        	$editor_role->id,
        ]);
    }
}
