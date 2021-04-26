<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Conversation;
use App\Models\Message;
use App\Models\User;

class MessageFactory extends Factory
{
	/**
	 * The name of the factory's corresponding model.
	 *
	 * @var string
	 */
	protected $model = Message::class;

	/**
	 * Define the model's default state.
	 *
	 * @return array
	 */
	public function definition()
	{
		return [
			// 'conversation_id' => auth()->user()->conversation_all()->random()['id'],
			'conversation_id' => 49,
			// 'user_id' => (rand(1, 0))? auth()->user()->friend_all()->random()['friend_id'] : auth()->user()->id,
			'user_id' => auth()->user()->id,
			'message' => $this->faker->realText($maxNbChars = 200, $indexSize = 2)
		];
	}
}
