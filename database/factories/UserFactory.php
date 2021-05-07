<?php

namespace Database\Factories;

use App\Models\User;
use App\Models\Relationship;
use App\Models\Gender;
use App\Models\City;
use App\Models\Wish;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class UserFactory extends Factory
{
	/**
	 * The name of the factory's corresponding model.
	 *
	 * @var string
	 */
	protected $model = User::class;

	/**
	 * Define the model's default state.
	 *
	 * @return array
	 */
	public function definition()
	{
		return [
			'name' => $this->faker->name,
			'lastname' => $this->faker->lastname,
			'email' => $this->faker->unique()->safeEmail,
			'email_verified_at' => now(),
			'birth_date' => $this->faker->date($format = 'Y-m-d', $max = 'now'),
			'about_me' => $this->faker->realText($maxNbChars = 150, $indexSize = 2),
			'relationship_id' => Relationship::all()->random()->id,
			'city_id' => City::all()->random()->id,
			'gender_id' => Gender::all()->random()->id,
			'wish_id' => Wish::all()->random()->id,
			'password' => bcrypt('secret'), // password
			'remember_token' => Str::random(10),
		];
	}
}
