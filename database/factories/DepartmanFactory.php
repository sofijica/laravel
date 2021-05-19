<?php

namespace Database\Factories;

use App\Models\Departman;
use Illuminate\Database\Eloquent\Factories\Factory;

class DepartmanFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Departman::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
           "naziv"=>$this->faker->jobTitle
        ];
    }
}
