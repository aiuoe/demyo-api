<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\User;

class UserTest extends TestCase
{
	use RefreshDatabase;
	/**
	 * A basic feature test example.
	 *
	 * @return void
	 */
	public function testAuth()
	{
		$signup = $this->postJson(config('app.url') . '/api/auth/signup/', 
		[
			'name' => 'ruben',
			'lastname' => 'cortez',
			'email' => 'ruben@dev.com',
			'password' => 'secret',
			'country' => 'venezuela',
			'sex' => 'male',
			'age' => 28
		]);

		$signup->assertStatus(200);

		$login = $this->postJson(config('app.url') . '/api/auth/login/', 
		[
			'email' => 'ruben@dev.com',
			'password' => 'secret'
		]);

		$login->assertStatus(200)
		->assertJsonStructure([
			'access_token',
			'token_type',
			'expires_in'
		]);

    $me = $this->withHeaders([
      'Authorization' => 'Bearer' . $login['access_token'],
    ])->postJson(config('app.url') . '/api/auth/me/');

    $me->assertStatus(200);

    $logout = $this->withHeaders([
      'Authorization' => 'Bearer' . $login['access_token'],
    ])->postJson(config('app.url') . '/api/auth/logout/');

    $logout->assertStatus(200)
  	->assertJsonStructure([
  		'message'
  	]);
	}

	// public function testUpdate()
	// {
	// 	$user = User::factory()->create();
	// 	$this->actingAs($user, 'api');

	// 	$update = $this->graphQl('mutation
	// 	{
	// 	  userUpdate(input: {
	// 	    id: 1
	// 	    name: "ruben"
	// 	    lastname: "cortez"
	// 	    email: "ruben@dev.com"
	// 	  })
	// 	  {
	// 	    id
	// 	    name
	// 	    lastname
	// 	    email
	// 	    created_at
	// 	    updated_at
	// 	  }
	// 	}');

	// 	// $update->dump();
	//   $update->assertStatus(200)
	// 	->assertJson([
	// 		'data' => 
	// 		[
	// 			'userUpdate' => 
	// 			[
	// 				'id' => 1,
	// 				'name' => 'ruben',
	// 				'lastname' => 'cortez',
	// 				'email' => 'ruben@dev.com',
	// 			]
	// 		]
	// 	]);
	// }

}
