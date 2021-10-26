<?php

namespace Database\Seeders;

use App\Models\Tokenizer;
use Illuminate\Database\Seeder;

class TokenizerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Tokenizer::factory()
            ->count(5)
            ->create();
    }
}
