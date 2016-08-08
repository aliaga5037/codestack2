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
        DB::table('users')->truncate();
        DB::table('users')->insert([
        	[
        		'name' => 'Aliaga',
        		'email' => 'aliaga.a@code.edu.az',
        		'surname' => 'Aliyev',
                'username' => 'aga',
                'role' => 'admin',
        		'password' => bcrypt('aga2416676')
        	]
        ]);
    }
    
}
