<?php

namespace Database\Factories;

use App\Models\Tokenizer;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

class TokenizerFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Tokenizer::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'token_code' => $this->faker->text,
            'user_id' => \App\Models\User::factory(),
        ];
    }
}
