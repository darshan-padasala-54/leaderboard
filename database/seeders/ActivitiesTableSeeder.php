<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use App\Models\Activity;

class ActivitiesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();

        foreach (range(1, 5) as $index) {
            Activity::create([
                'activity' => $faker->words(1, true), // dummy single word
            ]);
        }
    }
}
