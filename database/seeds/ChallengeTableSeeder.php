<?php
declare(strict_types = 1);

use Illuminate\Database\Seeder;

class ChallengeTableSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('challenges')->insert([
            ['title' => 'Run 1k'],
            ['title' => 'Run 2k'],
            ['title' => 'Run 5k'],
            ['title' => 'Run 10k'],
            ['title' => 'Run 21k'],
            ['title' => 'Run a marathon'],
            ['title' => 'Get a cat'],
            ['title' => 'Buy cat food'],
            ['title' => 'Feed my cat'],
            ['title' => 'Feed the neighbour\'s cat'],
        ]);
    }
}
