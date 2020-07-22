<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	$this->call('UserSeeder');
		$this->call('EventsSeeder');
		$this->call('MemberSeeder');

		for($i = 0; $i < 50; ++$i){
			$member = DB::table('members')->inRandomOrder()->first();
			$event = DB::table('events')->inRandomOrder()->first();
			DB::table('event_members')->insert([
				'event_id' => $event->id,
				'member_id' => $member->id
			]);
		}

    }
}
