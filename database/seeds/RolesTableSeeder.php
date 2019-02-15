<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Permission;
use App\Role;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('roles')->insert([
            'slug' => 'admin',
            'name' => 'Adminstrador',
            'description' => 'Tiene permisos absolutos',
        ]);

        DB::table('roles')->insert([
            'slug' => 'guest',
            'name' => 'Invitado',
            'description' => 'Tiene permisos para ver elementos',
        ]);

        DB::table('roles')->insert([
            'slug' => 'editor',
            'name' => 'Editor',
            'description' => 'Tiene permisos de edición',
        ]);
    }
}
