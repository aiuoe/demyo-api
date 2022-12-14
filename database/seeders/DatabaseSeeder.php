<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class DatabaseSeeder extends Seeder
{
	/**
	 * Seed the application's database.
	 *
	 * @return void
	 */
	public function run()
	{
		$this->call([
			CitySeeder::class,
			GenderSeeder::class,
			RelationshipSeeder::class,
			WishSeeder::class,
			UserSeeder::class,
			// FriendSeeder::class,
			// MessageSeeder::class,
		]);
		
	}
}
