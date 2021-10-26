<?php

namespace Database\Seeders;

use App\Models\Refueling;
use Illuminate\Database\Seeder;

class RefuelingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Refueling::factory()
            ->count(5)
            ->create();
    }
}
