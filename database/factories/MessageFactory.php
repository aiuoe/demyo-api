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
			'friend_id' => auth()->user()->friends()->get()->random()->friend_id,
			'message' => $this->faker->realText($maxNbChars = 200, $indexSize = 2)
		];
	}
}
