<?php

namespace Tests\Feature\Controllers;

use App\Models\User;
use App\Models\Favorite;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class FavoriteControllerTest extends TestCase
{
    use RefreshDatabase, WithFaker;

    protected function setUp(): void
    {
        parent::setUp();

        $this->actingAs(
            User::factory()->create(['email' => 'admin@admin.com'])
        );

        $this->seed(\Database\Seeders\PermissionsSeeder::class);

        $this->withoutExceptionHandling();
    }

    /**
     * @test
     */
    public function it_displays_index_view_with_favorites()
    {
        $favorites = Favorite::factory()
            ->count(5)
            ->create();

        $response = $this->get(route('favorites.index'));

        $response
            ->assertOk()
            ->assertViewIs('app.favorites.index')
            ->assertViewHas('favorites');
    }

    /**
     * @test
     */
    public function it_displays_create_view_for_favorite()
    {
        $response = $this->get(route('favorites.create'));

        $response->assertOk()->assertViewIs('app.favorites.create');
    }

    /**
     * @test
     */
    public function it_stores_the_favorite()
    {
        $data = Favorite::factory()
            ->make()
            ->toArray();

        $response = $this->post(route('favorites.store'), $data);

        $this->assertDatabaseHas('favorites', $data);

        $favorite = Favorite::latest('id')->first();

        $response->assertRedirect(route('favorites.edit', $favorite));
    }

    /**
     * @test
     */
    public function it_displays_show_view_for_favorite()
    {
        $favorite = Favorite::factory()->create();

        $response = $this->get(route('favorites.show', $favorite));

        $response
            ->assertOk()
            ->assertViewIs('app.favorites.show')
            ->assertViewHas('favorite');
    }

    /**
     * @test
     */
    public function it_displays_edit_view_for_favorite()
    {
        $favorite = Favorite::factory()->create();

        $response = $this->get(route('favorites.edit', $favorite));

        $response
            ->assertOk()
            ->assertViewIs('app.favorites.edit')
            ->assertViewHas('favorite');
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

        $response = $this->put(route('favorites.update', $favorite), $data);

        $data['id'] = $favorite->id;

        $this->assertDatabaseHas('favorites', $data);

        $response->assertRedirect(route('favorites.edit', $favorite));
    }

    /**
     * @test
     */
    public function it_deletes_the_favorite()
    {
        $favorite = Favorite::factory()->create();

        $response = $this->delete(route('favorites.destroy', $favorite));

        $response->assertRedirect(route('favorites.index'));

        $this->assertSoftDeleted($favorite);
    }
}
