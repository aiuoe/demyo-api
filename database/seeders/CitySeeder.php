<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class CitySeeder extends Seeder
{
  /**
   * Run the database seeds.
   *
   * @return void
   */
  public function run()
  {
  	DB::table('cities')->upsert([
  		[
  			'id' => 1,
  			'name' => 'Aleksandriya',
        'created_at' => Carbon::now(), 
        'updated_at' => Carbon::now()
  		],
  		[
  			'id' => 2,
  			'name' => 'Bakhmut',
        'created_at' => Carbon::now(), 
        'updated_at' => Carbon::now()
  		],
  		[
  			'id' => 3,
  			'name' => 'Belaya Tserkov',
        'created_at' => Carbon::now(), 
        'updated_at' => Carbon::now()
  		],
  		[
  			'id' => 4,
  			'name' => 'Berdichev',
        'created_at' => Carbon::now(), 
        'updated_at' => Carbon::now()
  		],
  		[
  			'id' => 5,
  			'name' => 'Berdyansk',
        'created_at' => Carbon::now(), 
        'updated_at' => Carbon::now()
  		],
  		[
  			'id' => 6,
  			'name' => 'Borispol',
        'created_at' => Carbon::now(), 
        'updated_at' => Carbon::now()
  		],
  		[
  			'id' => 7,
  			'name' => 'Brovary',
        'created_at' => Carbon::now(), 
        'updated_at' => Carbon::now()
  		],
  		[
  			'id' => 8,
  			'name' => 'Cherkassy',
        'created_at' => Carbon::now(), 
        'updated_at' => Carbon::now()
  		],
  		[
  			'id' => 9,
  			'name' => 'Chernigov',
        'created_at' => Carbon::now(), 
        'updated_at' => Carbon::now()
  		],
  		[
  			'id' => 10,
  			'name' => 'Chernomorsk',
        'created_at' => Carbon::now(), 
        'updated_at' => Carbon::now()
  		],
  		[
  			'id' => 11,
  			'name' => 'Chernovtsy',
        'created_at' => Carbon::now(), 
        'updated_at' => Carbon::now()
  		],
  		[
  			'id' => 12,
  			'name' => 'Dnepr',
        'created_at' => Carbon::now(), 
        'updated_at' => Carbon::now()
  		],
  		[
  			'id' => 13,
  			'name' => 'Energodar',
        'created_at' => Carbon::now(), 
        'updated_at' => Carbon::now()
  		],
  		[
  			'id' => 14,
  			'name' => 'Gorishniye Plavni',
        'created_at' => Carbon::now(), 
        'updated_at' => Carbon::now()
  		],
  		[
  			'id' => 15,
  			'name' => 'Irpen',
        'created_at' => Carbon::now(), 
        'updated_at' => Carbon::now()
  		],
  		[
  			'id' => 16,
  			'name' => 'Ivano Frankovsk',
        'created_at' => Carbon::now(), 
        'updated_at' => Carbon::now()
  		],
  		[
  			'id' => 17,
  			'name' => 'Izmail',
        'created_at' => Carbon::now(), 
        'updated_at' => Carbon::now()
  		],
  		[
  			'id' => 18,
  			'name' => 'Kalush',
        'created_at' => Carbon::now(), 
        'updated_at' => Carbon::now()
  		],
  		[
  			'id' => 19,
  			'name' => 'Kamenets Podolskiy',
        'created_at' => Carbon::now(), 
        'updated_at' => Carbon::now()
  		],
  		[
  			'id' => 20,
  			'name' => 'Kamenskoye',
        'created_at' => Carbon::now(), 
        'updated_at' => Carbon::now()
  		],
  		[
  			'id' => 21,
  			'name' => 'Kharkov',
        'created_at' => Carbon::now(), 
        'updated_at' => Carbon::now()
  		],
  		[
  			'id' => 22,
  			'name' => 'Kherson',
        'created_at' => Carbon::now(), 
        'updated_at' => Carbon::now()
  		],
  		[
  			'id' => 23,
  			'name' => 'Khmelnitskiy',
        'created_at' => Carbon::now(), 
        'updated_at' => Carbon::now()
  		],
  		[
  			'id' => 24,
  			'name' => 'Kolomyya',
        'created_at' => Carbon::now(), 
        'updated_at' => Carbon::now()
  		],
  		[
  			'id' => 25,
  			'name' => 'Konotop',
        'created_at' => Carbon::now(), 
        'updated_at' => Carbon::now()
  		],
  		[
  			'id' => 26,
  			'name' => 'Konstantinovka',
        'created_at' => Carbon::now(), 
        'updated_at' => Carbon::now()
  		],
  		[
  			'id' => 27,
  			'name' => 'Korosten',
        'created_at' => Carbon::now(), 
        'updated_at' => Carbon::now()
  		],
  		[
  			'id' => 28,
  			'name' => 'Kovel',
        'created_at' => Carbon::now(), 
        'updated_at' => Carbon::now()
  		],
  		[
  			'id' => 29,
  			'name' => 'Kremenchug',
        'created_at' => Carbon::now(), 
        'updated_at' => Carbon::now()
  		],
  		[
  			'id' => 30,
  			'name' => 'Kropivnitskiy',
        'created_at' => Carbon::now(), 
        'updated_at' => Carbon::now()
  		],
  		[
  			'id' => 31,
  			'name' => 'Kryvyi Rih',
        'created_at' => Carbon::now(), 
        'updated_at' => Carbon::now()
  		],
  		[
  			'id' => 32,
  			'name' => 'Kyiv',
        'created_at' => Carbon::now(), 
        'updated_at' => Carbon::now()
  		],
  		[
  			'id' => 33,
  			'name' => 'Lozovaya',
        'created_at' => Carbon::now(), 
        'updated_at' => Carbon::now()
  		],
  		[
  			'id' => 34,
  			'name' => 'Lutsk',
        'created_at' => Carbon::now(), 
        'updated_at' => Carbon::now()
  		],
  		[
  			'id' => 35,
  			'name' => 'Mariupol',
        'created_at' => Carbon::now(), 
        'updated_at' => Carbon::now()
  		],
  		[
  			'id' => 36,
  			'name' => 'Melitopol',
        'created_at' => Carbon::now(), 
        'updated_at' => Carbon::now()
  		],
  		[
  			'id' => 37,
  			'name' => 'Mukachevo',
        'created_at' => Carbon::now(), 
        'updated_at' => Carbon::now()
  		],
  		[
  			'id' => 38,
  			'name' => 'Nezhin',
        'created_at' => Carbon::now(), 
        'updated_at' => Carbon::now()
  		],
  		[
  			'id' => 39,
  			'name' => 'Nikolayev',
        'created_at' => Carbon::now(), 
        'updated_at' => Carbon::now()
  		],
  		[
  			'id' => 40,
  			'name' => 'Nikopol',
        'created_at' => Carbon::now(), 
        'updated_at' => Carbon::now()
  		],
  		[
  			'id' => 41,
  			'name' => 'Novograd Volynskiy',
        'created_at' => Carbon::now(), 
        'updated_at' => Carbon::now()
  		],
  		[
  			'id' => 42,
  			'name' => 'Novomoskovsk',
        'created_at' => Carbon::now(), 
        'updated_at' => Carbon::now()
  		],
  		[
  			'id' => 43,
  			'name' => 'Novovolynsk',
        'created_at' => Carbon::now(), 
        'updated_at' => Carbon::now()
  		],
  		[
  			'id' => 44,
  			'name' => 'Odessa',
        'created_at' => Carbon::now(), 
        'updated_at' => Carbon::now()
  		],
  		[
  			'id' => 45,
  			'name' => 'Pavlograd',
        'created_at' => Carbon::now(), 
        'updated_at' => Carbon::now()
  		],
  		[
  			'id' => 46,
  			'name' => 'Pervomaysk',
        'created_at' => Carbon::now(), 
        'updated_at' => Carbon::now()
  		],
  		[
  			'id' => 47,
  			'name' => 'Pokrovsk',
        'created_at' => Carbon::now(), 
        'updated_at' => Carbon::now()
  		],
  		[
  			'id' => 48,
  			'name' => 'Poltava',
        'created_at' => Carbon::now(), 
        'updated_at' => Carbon::now()
  		],
  		[
  			'id' => 49,
  			'name' => 'Priluki',
        'created_at' => Carbon::now(), 
        'updated_at' => Carbon::now()
  		],
  		[
  			'id' => 50,
  			'name' => 'Rovno',
        'created_at' => Carbon::now(), 
        'updated_at' => Carbon::now()
  		],
  		[
  			'id' => 51,
  			'name' => 'Shostka',
        'created_at' => Carbon::now(), 
        'updated_at' => Carbon::now()
  		],
  		[
  			'id' => 52,
  			'name' => 'Smela',
        'created_at' => Carbon::now(), 
        'updated_at' => Carbon::now()
  		],
  		[
  			'id' => 53,
  			'name' => 'Sumy',
        'created_at' => Carbon::now(), 
        'updated_at' => Carbon::now()
  		],
  		[
  			'id' => 54,
  			'name' => 'Ternopol',
        'created_at' => Carbon::now(), 
        'updated_at' => Carbon::now()
  		],
  		[
  			'id' => 55,
  			'name' => 'Uman',
        'created_at' => Carbon::now(), 
        'updated_at' => Carbon::now()
  		],
  		[
  			'id' => 56,
  			'name' => 'Uzhgorod',
        'created_at' => Carbon::now(), 
        'updated_at' => Carbon::now()
  		],
  		[
  			'id' => 57,
  			'name' => 'Vinnitsa',
        'created_at' => Carbon::now(), 
        'updated_at' => Carbon::now()
  		],
  		[
  			'id' => 58,
  			'name' => 'Zaporozhye',
        'created_at' => Carbon::now(), 
        'updated_at' => Carbon::now()
  		],
  		[
  			'id' => 59,
  			'name' => 'Zhitomir',
        'created_at' => Carbon::now(), 
        'updated_at' => Carbon::now()
  		],
  	], ['id']);    
  }
}