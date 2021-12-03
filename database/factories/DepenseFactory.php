<?php

namespace Database\Factories;

use App\Models\Depense;
use Illuminate\Database\Eloquent\Factories\Factory;

class DepenseFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Depense::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'montantDepense'=>$this->faker->numberBetween(50, 1000),
            'categorieDepense'=>$this->faker->sentence(1),
            'description'=>$this->faker->sentence(),
            'idRevenu'=>$this->faker->numberBetween(1, 5)   
        ];
    }
}
