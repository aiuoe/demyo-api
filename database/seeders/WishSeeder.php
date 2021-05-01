<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class WishSeeder extends Seeder
{
  /**
   * Run the database seeds.
   *
   * @return void
   */
  public function run()
  {
		DB::table('wishes')->upsert([
			[
				'id' => 1,
				'name' => 'общаться и встречаться с людьми',
	      'created_at' => Carbon::now(), 
	      'updated_at' => Carbon::now()
			],
			[
				'id' => 2,
				'name' => 'Выйти с кем-то',
	      'created_at' => Carbon::now(), 
	      'updated_at' => Carbon::now()
			],
			[
				'id' => 3,
				'name' => 'Серьезные отношения',
	      'created_at' => Carbon::now(), 
	      'updated_at' => Carbon::now()
			],
			[
				'id' => 4,
				'name' => 'который возникает',
	      'created_at' => Carbon::now(), 
	      'updated_at' => Carbon::now()
			],
			[
				'id' => 5,
				'name' => 'найди любовь всей моей жизни',
	      'created_at' => Carbon::now(), 
	      'updated_at' => Carbon::now()
			],
		], ['id']);
  }
}
