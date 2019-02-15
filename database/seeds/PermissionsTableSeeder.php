<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PermissionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('permissions')->insert([
            'slug' => 'see',
            'name' => 'Ver',
            'description' => 'Puede ver elementos en formularios',
        ]);

        DB::table('permissions')->insert([
            'slug' => 'edit',
            'name' => 'Editar',
            'description' => 'Puede editar elementos en formularios',
        ]);

        DB::table('permissions')->insert([
            'slug' => 'create',
            'name' => 'Crear',
            'description' => 'Puede crear elementos en formularios',
        ]);

        DB::table('permissions')->insert([
            'slug' => 'delete',
            'name' => 'Eliminar',
            'description' => 'Puede eliminar elementos en formularios',
        ]);
    }
}
