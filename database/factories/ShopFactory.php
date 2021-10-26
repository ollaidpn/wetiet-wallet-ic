<?php

namespace Database\Factories;

use App\Models\Shop;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

class ShopFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Shop::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'shop_name' => $this->faker->text(255),
            'description' => $this->faker->sentence(15),
            'telephone' => $this->faker->randomNumber,
            'email' => $this->faker->email,
            'user_id' => \App\Models\User::factory(),
        ];
    }
}
