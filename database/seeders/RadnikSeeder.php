<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Radnik;

class RadnikSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Radnik::factory()->count(35)->create();
    }
}
