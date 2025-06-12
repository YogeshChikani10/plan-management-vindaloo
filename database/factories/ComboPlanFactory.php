<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\ComboPlan>
 */
class ComboPlanFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            //
            'name'  => $this->faker->word(). ' Combo Plan '.uniqid(),
            'price' => $this->faker->randomFloat(2, 100, 99999),
        ];
    }
}
