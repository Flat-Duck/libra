<?php

namespace Database\Seeders;

use App\Models\Paper;
use Illuminate\Database\Seeder;

class PaperSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Paper::factory()
            ->count(5)
            ->create();
    }
}
