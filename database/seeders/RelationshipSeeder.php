<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class RelationshipSeeder extends Seeder
{
  /**
   * Run the database seeds.
   *
   * @return void
   */
  public function run()
  {
		DB::table('relationships')->upsert([
			[
				'id' => 1,
				'name' => 'В сложные отношения',
	      'created_at' => Carbon::now(), 
	      'updated_at' => Carbon::now()
			],
			[
				'id' => 2,
				'name' => 'Один',
	      'created_at' => Carbon::now(), 
	      'updated_at' => Carbon::now()
			],
			[
				'id' => 3,
				'name' => 'С парой',
	      'created_at' => Carbon::now(), 
	      'updated_at' => Carbon::now()
			],
		], ['id']);
  }
}
