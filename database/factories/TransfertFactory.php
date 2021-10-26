<?php

namespace Database\Factories;

use App\Models\Transfert;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

class TransfertFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Transfert::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'to_phone' => $this->faker->randomNumber,
            'contact_id' => $this->faker->randomNumber(0),
            'amount' => $this->faker->randomNumber,
            'roken' => $this->faker->text,
            'user_id' => \App\Models\User::factory(),
        ];
    }
}
