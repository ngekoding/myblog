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
    	$adminRole  = Role::where('name', 'admin')->first()->id;
		$authorRole = Role::where('name', 'author')->first()->id;

        $user = User::create([
        	'name' 		=> 'Nur Muhammad',
        	'email' 	=> 'admin@gmail.com',
        	'password'	=> bcrypt('123456'),
        ]);

        $user->assignRole('admin');

        $user = User::create([
        	'name' 		=> 'Nur',
        	'email' 	=> 'author@gmail.com',
        	'password'	=> bcrypt('123456'),
        ]);

        $user->assignRole('author');
    }
}
