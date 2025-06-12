<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\EligibilityCriteria>
 */
class EligibilityCriteriaFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {

        $ageGreaterThan    = $this->faker->numberBetween( 18, 40 );
        $ageLessThan       = $this->faker->numberBetween( $ageGreaterThan + 1, 40 );
        $incomeGreaterThan = $this->faker->numberBetween( 10000, 50000 );
        $incomeLessThan    = $this->faker->numberBetween( $incomeGreaterThan + 1000, 100000 );

        return [
            //
            'name'                => $this->faker->word(). ' Criteria '.uniqid(),
            'age_less_than'       => $ageLessThan,
            'age_greater_than'    => $ageGreaterThan,
            'last_login_days_ago' => $this->faker->numberBetween(1, 365),
            'income_less_than'    => $incomeLessThan,
            'income_greater_than' => $incomeGreaterThan,
        ];
    }
}
