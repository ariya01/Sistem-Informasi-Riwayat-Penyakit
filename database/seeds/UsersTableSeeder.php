<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      	DB::table('roles')->insert([
            'name' => 'admin',
            'display_name' => 'Admin',
        ]);

        DB::table('roles')->insert([
            'name' => 'pasien',
            'display_name' => 'Pasien',
        ]);

        DB::table('roles')->insert([
            'name' => 'dokter',
            'display_name' => 'Dokter',
        ]);

 		DB::table('users')->insert([
            'name_user' => 'ariya',
            'email' => 'ariyadevanto@gmail.com',
            'password' => bcrypt('12345678'),
        ]);

		DB::table('role_user')->insert([
            'user_id' => '1',
            'role_id' => '1',
        ]);        
    }
}
