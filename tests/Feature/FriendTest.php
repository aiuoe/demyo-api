<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\User;

class FriendTest extends TestCase
{
	use RefreshDatabase;
	/**
	 * A basic feature test example.
	 *
	 * @return void
	 */
	public function test_friends()
	{

		$user = User::factory()->create();
		$friend = User::factory()->create();
		
		$response = $this->actingAs($user)->graphQl("mutation
		{
		  friendRequest(friend_id: $friend->id)
		}");
		// $response->dump();
		$response->assertStatus(200);
	}
}
