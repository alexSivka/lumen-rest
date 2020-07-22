<?php

use Laravel\Lumen\Testing\DatabaseMigrations;
use Laravel\Lumen\Testing\DatabaseTransactions;
use App\User;


class ApiTest extends TestCase
{

	private $token;

    public function testGetToken(){
		$token = $this->getToken();
		$this->assertIsString($token);
	}

	public function testGetMember(){
		$this->get('/api/members/1', [], ['HTTP_Authorization' => 'Bearer ' . $this->getToken()]);
		$this->seeStatusCode(200);
		$this->seeJsonStructure(
			[
				'first_name',
				'last_name',
				'email',
				'created_at',
				'updated_at',
				'events'
			]
		);
	}

	public function testGetMembers(){
		$this->get('/api/members', [], ['HTTP_Authorization' => 'Bearer ' . $this->getToken()]);
		$this->seeStatusCode(200);
		$this->seeJsonStructure(
			[ '*' => [
				'first_name',
				'last_name',
				'email',
				'created_at',
				'updated_at'
			]]
		);
	}

	public function testGetEventMembers(){
		$this->get('/api/eventMembers/1', [], ['HTTP_Authorization' => 'Bearer ' . $this->getToken()]);
		$this->seeStatusCode(200);
		$this->seeJsonStructure(
			[ '*' => [
				'first_name',
				'last_name',
				'email',
				'created_at',
				'updated_at'
			]]
		);
	}

	private function getToken(){
    	if(!$this->token) {
			$user = User::first();
			$json = $this->post('/api/login', ['email' => $user->email, 'password' => 'test'])->response->decodeResponseJson();
			$this->token = $json['token'] ?? false;
		}
    	return $this->token;
	}

}
