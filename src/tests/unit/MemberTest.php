<?php

use Laravel\Lumen\Testing\DatabaseMigrations;
use Laravel\Lumen\Testing\DatabaseTransactions;
use Illuminate\Support\Facades\Schema;
use App\Member;


class MemberTest extends TestCase
{
	public function testMemberSchema()
	{
		$this->assertTrue(
			Schema::hasColumns('members', [
				'id','first_name', 'last_name', 'email', 'created_at', 'updated_at'
			]), 1);
	}

	public function testCreateMember(){
		$member = factory('App\Member')->create();
		$this->assertInstanceOf(Member::class, $member);
	}

	public function testMemberEvents(){
		$member = factory('App\Member')->create();
		$this->assertInstanceOf('Illuminate\Database\Eloquent\Collection', $member->events);
	}
}
