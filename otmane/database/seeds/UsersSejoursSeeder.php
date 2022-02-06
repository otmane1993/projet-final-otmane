<?php

use Illuminate\Database\Seeder;
//use Faker;

class UsersSejoursSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //$faker = Faker::create();

        foreach(range(1, 25) as $index)
        {
            DB::table('users_of_sejours')->insert([
                'sejour_id' => rand(1,25),
                'user_id' => rand(1,25),
                //$faker->unique()->randomNumber(1, 100)
            ]);
        
        }
    }
}
