<?php
declare(strict_types = 1);

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(): void
    {
         $this->call(ChallengeTableSeeder::class);
    }
}
