<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Departman;
class DepartmanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Departman::factory()->count(20)->create();
    }
}
