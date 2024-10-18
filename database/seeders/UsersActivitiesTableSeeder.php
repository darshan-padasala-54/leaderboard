<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use App\Models\UsersActivity;

class UsersActivitiesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();

        foreach (range(1, 100) as $index) {
            UsersActivity::create([
                'user_id' => $faker->numberBetween(1, 10),
                'activity_id' => $faker->numberBetween(1, 5),
                'created_at' => $faker->dateTimeBetween($startDate = '-3 month',$endDate = 'now'),
                'updated_at' => now(),
            ]);
        }
    }
}
