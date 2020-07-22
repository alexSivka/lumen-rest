<?php

use Laravel\Lumen\Testing\DatabaseMigrations;
use Laravel\Lumen\Testing\DatabaseTransactions;
use Illuminate\Support\Facades\Schema;
use App\Event;

class EventTest extends TestCase
{
	public function testEventSchema()
	{
		$this->assertTrue(
			Schema::hasColumns('events', [
				'id','name', 'city', 'date', 'created_at', 'updated_at'
			]), 1);
	}

	public function testCreateEvent(){
		$event = factory('App\Event')->create();
		$this->assertInstanceOf(Event::class, $event);
	}

	public function testEventMembers(){
		$event = factory('App\Event')->create();
		$this->assertInstanceOf('Illuminate\Database\Eloquent\Collection', $event->members);
	}
}
