<?php

use Illuminate\Database\Seeder;

class UserChallengesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('user_challenges')->insert([
            ['user_id' => 1, 'challenge_id' => 1],
            ['user_id' => 1, 'challenge_id' => 2],
            ['user_id' => 1, 'challenge_id' => 3],
            ['user_id' => 1, 'challenge_id' => 4],
            ['user_id' => 1, 'challenge_id' => 5],
            ['user_id' => 1, 'challenge_id' => 6],
            ['user_id' => 1, 'challenge_id' => 7],
            ['user_id' => 1, 'challenge_id' => 8],
         ]);
    }
}
