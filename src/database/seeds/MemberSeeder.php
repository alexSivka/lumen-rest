<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class MemberSeeder extends Seeder
{
	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		$faker = Faker::create();

		for($i = 0; $i < 10; $i++){
			DB::table('members')->insert([
				'first_name'          => $faker->firstName,
				'last_name'          => $faker->lastName,
				'email'   => $faker->email,
				'created_at' => Carbon::now(),
				'updated_at' => Carbon::now()
			]);
		}
	}
}