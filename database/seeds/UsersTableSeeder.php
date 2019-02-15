<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {      
        DB::table('users')->insert([
            'name' => 'Administrador',
            'email' => 'admin@gmail.com',
            'password' => bcrypt('secret'),
        ]);

        DB::table('users')->insert([
            'name' => 'Invitado',
            'email' => 'guest@gmail.com',
            'password' => bcrypt('secret'),
        ]);
        
        DB::table('users')->insert([
            'name' => 'Editor',
            'email' => 'editor@gmail.com',
            'password' => bcrypt('secret'),
        ]);
        
        DB::table('users')->insert([
            'name' => 'Samuel González',
            'email' => 'sage393@gmail.com',
            'password' => bcrypt('secret'),
        ]);   
    }
}
