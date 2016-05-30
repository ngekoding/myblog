<?php

use Illuminate\Database\Seeder;

use App\User;

use App\Role;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	$adminRole  = Role::where('name', 'Administrator')->first()->id;
		$authorRole = Role::where('name', 'Author')->first()->id;

        User::create([
        	'name' 		=> 'Nur Muhammad',
        	'email' 	=> str_random(10).'@gmail.com',
        	'password'	=> bcrypt('123456'),
        	'role_id'	=> $adminRole
        ]);

        User::create([
        	'name' 		=> 'Nur',
        	'email' 	=> str_random(10).'@gmail.com',
        	'password'	=> bcrypt('123456'),
        	'role_id'	=> $authorRole
        ]);
    }
}
