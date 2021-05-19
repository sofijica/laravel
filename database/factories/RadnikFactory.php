<?php

namespace Database\Factories;

use App\Models\Radnik;
use Illuminate\Database\Eloquent\Factories\Factory;

class RadnikFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Radnik::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'ime'=>$this->faker->firstName(),
            'prezime'=>$this->faker->lastName,
            'struka_id'=>$this->faker->numberBetween($min = 1, $max = 20),
            'departman_id'=>$this->faker->numberBetween($min = 1, $max = 20),
            'plata'=>$this->faker->numberBetween($min = 20000, $max = 50000)
        ];
    }
}
