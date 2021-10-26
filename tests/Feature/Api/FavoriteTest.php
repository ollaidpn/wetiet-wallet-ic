<?php

namespace Tests\Feature\Api;

use App\Models\User;
use App\Models\Favorite;

use Tests\TestCase;
use Laravel\Sanctum\Sanctum;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class FavoriteTest extends TestCase
{
    use RefreshDatabase, WithFaker;

    protected function setUp(): void
    {
        parent::setUp();

        $user = User::factory()->create(['email' => 'admin@admin.com']);

        Sanctum::actingAs($user, [], 'web');

        $this->seed(\Database\Seeders\PermissionsSeeder::class);

        $this->withoutExceptionHandling();
    }

    /**
     * @test
     */
    public function it_gets_favorites_list()
    {
        $favorites = Favorite::factory()
            ->count(5)
            ->create();

        $response = $this->getJson(route('api.favorites.index'));

        $response->assertOk()->assertSee($favorites[0]->name);
    }

    /**
     * @test
     */
    public function it_stores_the_favorite()
    {
        $data = Favorite::factory()
            ->make()
            ->toArray();

        $response = $this->postJson(route('api.favorites.store'), $data);

        $this->assertDatabaseHas('favorites', $data);

        $response->assertStatus(201)->assertJsonFragment($data);
    }

    /**
     * @test
     */
    public function it_updates_the_favorite()
    {
        $favorite = Favorite::factory()->create();

        $user = User::factory()->create();

        $data = [
            'name' => $this->faker->name,
            'telephone' => $this->faker->randomNumber,
            'has_account' => $this->faker->text(255),
            'user_id' => $user->id,
        ];

        $response = $this->putJson(
            route('api.favorites.update', $favorite),
            $data
        );

        $data['id'] = $favorite->id;

        $this->assertDatabaseHas('favorites', $data);

        $response->assertOk()->assertJsonFragment($data);
    }

    /**
     * @test
     */
    public function it_deletes_the_favorite()
    {
        $favorite = Favorite::factory()->create();

        $response = $this->deleteJson(
            route('api.favorites.destroy', $favorite)
        );

        $this->assertSoftDeleted($favorite);

        $response->assertNoContent();
    }
}
