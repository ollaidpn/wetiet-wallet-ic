<?php

namespace Database\Factories;

use App\Models\Refueling;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

class RefuelingFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Refueling::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'amount' => $this->faker->randomNumber,
            'token' => $this->faker->text,
            'user_id' => \App\Models\User::factory(),
            'shop_id' => \App\Models\Shop::factory(),
        ];
    }
}
