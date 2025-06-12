<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\ComboPlan;
use App\Models\Plan;

class ComboPlansSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $chunkSize = 1000;

        for($i = 0; $i < 15; $i++ ) {
            $comboPlans = ComboPlan::factory()->count($chunkSize)->create();

            foreach( $comboPlans as $combo ) {
                $planIds = Plan::inRandomOrder()->take(rand(2,5))->pluck('id');
                $combo->plans()->sync($planIds);
            }
        }
    }
}
