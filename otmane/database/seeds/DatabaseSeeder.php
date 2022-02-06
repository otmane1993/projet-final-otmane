<?php

use Illuminate\Database\Seeder;
use Seede\UserSeeder;
use Seede\VilleSeeder;
use Seede\HotelSeeder;
use Seede\SejourSeeder;
//use Seede\ReservationSeeder;
class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([UserSeeder::class]);
        $this->call([VilleSeeder::class]);
        $this->call([HotelSeeder::class]);
        $this->call([SejourSeeder::class]);
        //$this->call([ReservationSeeder::class]);
    }
}
