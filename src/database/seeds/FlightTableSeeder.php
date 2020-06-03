<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class FlightTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \DB::table('flights')->insert([
            ['id' =>  1,  'name' => 'Lucy1',  'movies' => 'hello1',  'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['id' =>  2,  'name' => 'Lucy2',  'movies' => 'hello2',  'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['id' =>  3,  'name' => 'Lucy3',  'movies' => 'hello3',  'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['id' =>  4,  'name' => 'Lucy4',  'movies' => 'hello4',  'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['id' =>  5,  'name' => 'Lucy5',  'movies' => 'hello5',  'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['id' =>  6,  'name' => 'Lucy6',  'movies' => 'hello6',  'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['id' =>  7,  'name' => 'Lucy7',  'movies' => 'hello7',  'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['id' =>  8,  'name' => 'Lucy8',  'movies' => 'hello8',  'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['id' =>  9,  'name' => 'Lucy9',  'movies' => 'hello9',  'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['id' =>  10, 'name' => 'Lucy10',  'movies' => 'hello10', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['id' =>  11, 'name' => 'Lucy11',  'movies' => 'hello11', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['id' =>  12, 'name' => 'Lucy12',  'movies' => 'hello12', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['id' =>  13, 'name' => 'Lucy13',  'movies' => 'hello13', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['id' =>  14, 'name' => 'Lucy14',  'movies' => 'hello14', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['id' =>  15, 'name' => 'Lucy15',  'movies' => 'hello15', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['id' =>  16, 'name' => 'Lucy16',  'movies' => 'hello16', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['id' =>  17, 'name' => 'Lucy17',  'movies' => 'hello17', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['id' =>  18, 'name' => 'Lucy18',  'movies' => 'hello18', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['id' =>  19, 'name' => 'Lucy19',  'movies' => 'hello19', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['id' =>  20, 'name' => 'Lucy20',  'movies' => 'hello20', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['id' =>  21, 'name' => 'Lucy21',  'movies' => 'hello21', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['id' =>  22, 'name' => 'Lucy22',  'movies' => 'hello22', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['id' =>  23, 'name' => 'Lucy23',  'movies' => 'hello23', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['id' =>  24, 'name' => 'Lucy24',  'movies' => 'hello24', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['id' =>  25, 'name' => 'Lucy25',  'movies' => 'hello25', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['id' =>  26, 'name' => 'Lucy26',  'movies' => 'hello26', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['id' =>  27, 'name' => 'Lucy27',  'movies' => 'hello27', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['id' =>  28, 'name' => 'Lucy28',  'movies' => 'hello28', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['id' =>  29, 'name' => 'Lucy29',  'movies' => 'hello29', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['id' =>  30, 'name' => 'Lucy30',  'movies' => 'hello30', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['id' =>  31, 'name' => 'Lucy31',  'movies' => 'hello31', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['id' =>  32, 'name' => 'Lucy32',  'movies' => 'hello32', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['id' =>  33, 'name' => 'Lucy33',  'movies' => 'hello33', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['id' =>  34, 'name' => 'Lucy34',  'movies' => 'hello34', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['id' =>  35, 'name' => 'Lucy35',  'movies' => 'hello35', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['id' =>  36, 'name' => 'Lucy36',  'movies' => 'hello36', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['id' =>  37, 'name' => 'Lucy37',  'movies' => 'hello37', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['id' =>  38, 'name' => 'Lucy38',  'movies' => 'hello38', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['id' =>  39, 'name' => 'Lucy39',  'movies' => 'hello39', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['id' =>  40, 'name' => 'Lucy40',  'movies' => 'hello40', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['id' =>  41, 'name' => 'Lucy41',  'movies' => 'hello41', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['id' =>  42, 'name' => 'Lucy42',  'movies' => 'hello42', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['id' =>  43, 'name' => 'Lucy43',  'movies' => 'hello43', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['id' =>  44, 'name' => 'Lucy44',  'movies' => 'hello44', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['id' =>  45, 'name' => 'Lucy45',  'movies' => 'hello45', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
        ]);
    }
}
