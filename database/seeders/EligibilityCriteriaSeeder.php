<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\EligibilityCriteria;

class EligibilityCriteriaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $chunkSize = 1000;

        for($i = 0; $i < 50; $i++ ) {
            EligibilityCriteria::insert(EligibilityCriteria::factory()->count($chunkSize)->make()->toArray());
        }
    }
}
