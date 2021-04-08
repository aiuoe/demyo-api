<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Faker\Generator;
use Illuminate\Container\Container;

class UserSeeder extends Seeder
{

	protected $faker;

	public function __construct()
	{
		$this->faker = $this->withFaker();
	}

  protected function withFaker()
  {
    return Container::getInstance()->make(Generator::class);
  }

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		$users = User::factory(10)->create();

		// send friend request
		$users->each(function ($item, $key) use ($users)
		{ 
			Auth::attempt(['email' => $item->email, 'password' => 'secret']);
			$users->each(function ($i, $k)
			{
				if (auth()->user()->id == $i->id) {return $i;} 

				if (!auth()->user()->getFriends()->contains('friend_id', '=', $i->id) && !auth()->user()->getFriendRequests()->contains('friend_id', '=', $i->id)) 
				{ 
					auth()->user()->friends()->create(['friend_id' => $i->id]);
				}
			});
		});

		// accept friend request
		$users->each(function ($item, $key)
		{
			Auth::attempt(['email' => $item->email, 'password' => 'secret']);

			auth()->user()
			->friendrequests()
			->get()
			->each(function ($item, $key)
			{
				$item->acceptFriendRequest();
			});

		});

		// send message
		$users->each(function ($item, $key) use ($users)
		{
			Auth::attempt(['email' => $item->email, 'password' => 'secret']);

			$users->each(function ($i, $k)
			{
				if (auth()->user()->id == $i->id) {return $i;} 

				// check conversation exists or create
				if (auth()->user()->getConversations()->contains('friend_id', '=', $i->id))
					$conversation_id = auth()->user()->getConversations()->where('friend_id', $i->id)->first()->id;
				else
					$conversation_id = auth()->user()->conversations()->create(['friend_id' => $i->id])->id;

				auth()->user()
				->messages()
				->create(
				[
					'conversation_id' => $conversation_id, 
					'message' => $this->faker->realText($maxNbChars = 200, $indexSize = 2)
				]);
			});
		});
	}
}
