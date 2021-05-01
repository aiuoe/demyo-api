<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class GenderSeeder extends Seeder
{
	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
  	DB::table('genders')->upsert([
  		[
  			'id' => 1,
  			'name' => 'male',
        'created_at' => Carbon::now(), 
        'updated_at' => Carbon::now()
  		],
  		[
  			'id' => 2,
  			'name' => 'female',
        'created_at' => Carbon::now(), 
        'updated_at' => Carbon::now()
  		],
  		[
  			'id' => 3,
  			'name' => 'couple',
        'created_at' => Carbon::now(), 
        'updated_at' => Carbon::now()
  		],
  		[
  			'id' => 4,
  			'name' => 'male_couple',
        'created_at' => Carbon::now(), 
        'updated_at' => Carbon::now()
  		],
  		[
  			'id' => 5,
  			'name' => 'female_couple',
        'created_at' => Carbon::now(), 
        'updated_at' => Carbon::now()
  		],
  	], ['id']);
	}
}
