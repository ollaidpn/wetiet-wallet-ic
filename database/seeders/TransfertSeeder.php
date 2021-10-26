<?php

namespace Database\Seeders;

use App\Models\Transfert;
use Illuminate\Database\Seeder;

class TransfertSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Transfert::factory()
            ->count(5)
            ->create();
    }
}
