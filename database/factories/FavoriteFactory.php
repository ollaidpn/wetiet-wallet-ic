<?php

namespace Database\Factories;

use App\Models\Favorite;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

class FavoriteFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Favorite::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->name,
            'telephone' => $this->faker->randomNumber,
            'has_account' => $this->faker->text(255),
            'user_id' => \App\Models\User::factory(),
        ];
    }
}
