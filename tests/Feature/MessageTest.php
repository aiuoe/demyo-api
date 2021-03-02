<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\User;

class MessageTest extends TestCase
{
	use RefreshDatabase;

	/**
	 * A basic feature test example.
	 *
	 * @return void
	 */
	public function test_messages()
	{
		$user = User::factory()->create();
		$friend = User::factory()->create();

		$friendRequest = $this->actingAs($user)->graphQl("mutation
		{
			friendRequest(friend_id: $friend->id)
		}");
		// $friendRequest->dump();
		$friendRequest->assertStatus(200);

		$friendRequestAccept = $this->actingAs($friend)->graphQl("mutation
		{
			friendRequestAccept(id: " . $friendRequest["data"]["friendRequest"] . " ) 
		}");
		// $friendRequestAccept->dump();
		$friendRequestAccept->assertStatus(200);

		$response = $this->actingAs($user)->graphQl("mutation
		{
		  messageUpsert(input: {
		  	id: 0
		  	friend_id: $friend->id
		  	message: \"Hello Word\"
	  	})
	  	{
	  		id
	  		user_id
	  		{
	  			id
	  			name
	  		}
	  		message
	  	}
		}");
		// $response->dump();
		$response->assertStatus(200);
	}
}
