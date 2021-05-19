<?php

namespace Database\Factories;

use App\Models\Struka;
use Illuminate\Database\Eloquent\Factories\Factory;

class StrukaFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Struka::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'naziv'=>$this->faker->word
        ];
    }
}
