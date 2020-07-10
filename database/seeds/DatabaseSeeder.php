<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
         DB::table('users')->insert([
            'name' => 'Admin',
			'sobrenome' => 'Administrador',
            'email' => 'admin@bertioga.sp.gov.br',
            'password' => bcrypt('admin123456'),
			'secretaria' => 'SECRETARIA DE ADMINISTRAÇÃO E FINANÇAS',
			'estado' => '1',
			'registro' => 'admin',
			'isAdmin' => '0',
        ]);
		
		DB::table('users')->insert([
            'name' => 'User',
			'sobrenome' => 'Usuario',
            'email' => 'user@bertioga.sp.gov.br',
            'password' => bcrypt('user123456'),
			'secretaria' => 'SECRETARIA DE ADMINISTRAÇÃO E FINANÇAS',
			'estado' => '1',
			'registro' => 'user',
			'isAdmin' => '0',
        ]);
    }
}
