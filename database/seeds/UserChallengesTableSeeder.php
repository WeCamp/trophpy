<?php

use Illuminate\Database\Seeder;

class UserChallengesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(\Faker\Generator $faker)
    {
        DB::table('user_challenges')->insert([
            ['user_id' => 1, 'challenge_id' => 1, 'started_on' => $faker->dateTime(), 'created_at' => $faker->dateTime(), 'updated_at' => $faker->dateTime()],
            ['user_id' => 1, 'challenge_id' => 2, 'started_on' => $faker->dateTime(), 'created_at' => $faker->dateTime(), 'updated_at' => $faker->dateTime()],
            ['user_id' => 1, 'challenge_id' => 3, 'started_on' => $faker->dateTime(), 'created_at' => $faker->dateTime(), 'updated_at' => $faker->dateTime()],
            ['user_id' => 2, 'challenge_id' => 4, 'started_on' => $faker->dateTime(), 'created_at' => $faker->dateTime(), 'updated_at' => $faker->dateTime()],
            ['user_id' => 2, 'challenge_id' => 5, 'started_on' => $faker->dateTime(), 'created_at' => $faker->dateTime(), 'updated_at' => $faker->dateTime()],
            ['user_id' => 2, 'challenge_id' => 6, 'started_on' => $faker->dateTime(), 'created_at' => $faker->dateTime(), 'updated_at' => $faker->dateTime()],
         ]);
    }
}
