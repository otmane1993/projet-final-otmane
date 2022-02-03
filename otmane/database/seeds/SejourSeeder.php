<?php
namespace Seeder;
use Illuminate\Database\Seeder;
use App\Sejour;

class SejourSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Sejour::class,25)->create();
    }
}
