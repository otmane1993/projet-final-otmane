<?php

use Illuminate\Database\Seeder;
use Seeder\UserSeeder;
use Seeder\VilleSeeder;
use Seeder\HotelSeeder;
use Seeder\SejourSeeder;
use Seeder\ReservationSeeder;
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
        $this->call([ReservationSeeder::class]);
    }
}
