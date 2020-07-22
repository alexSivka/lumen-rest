<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It is a breeze. Simply tell Lumen the URIs it should respond to
| and give it the Closure to call when that URI is requested.
|
*/

$router->get('/', function () use ($router) {
	return $router->app->version();
});

$router->post('api/login', 'AuthController@login');

$router->group(['prefix' => 'api', 'middleware' => 'auth'], function () use ($router) {

	//$router->post('register', 'AuthController@register');

	$router->get('members',  ['uses' => 'MemberController@showAllMembers']);

	$router->get('event-members/{id}',  ['uses' => 'MemberController@eventMembers']);

	$router->get('members/{id}', ['uses' => 'MemberController@showOneMember']);

	$router->post('members', ['uses' => 'MemberController@create']);

	$router->delete('members/{id}', ['uses' => 'MemberController@delete']);

	$router->put('members/{id}', ['uses' => 'MemberController@update']);
});
