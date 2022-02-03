<?php
namespace Seeder;
use Illuminate\Database\Seeder;
use App\Ville;

class VilleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Ville::class,25)->create();
    }
}
