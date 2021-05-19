<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Struka;

class StrukaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Struka::factory()->count(20)->create();
    }
}
