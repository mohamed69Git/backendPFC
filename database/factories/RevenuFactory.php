<?php

namespace Database\Factories;

use App\Models\Revenu;
use Illuminate\Database\Eloquent\Factories\Factory;

class RevenuFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Revenu::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'categorieRevenu'=>$this->faker->sentence(1),
            'montantRevenu'=>$this->faker->numberBetween(20000, 50000)
        ];
    }
}
