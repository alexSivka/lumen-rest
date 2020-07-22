<?php

use Illuminate\Database\Seeder;
//use Faker\Factory as Faker;
use App\User;

class UserSeeder extends Seeder
{
	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{

		User::create([
			'name' => 'test',
			'email' => 'test@example.com',
			'password' => app('hash')->make('test')
		]);
	}
}