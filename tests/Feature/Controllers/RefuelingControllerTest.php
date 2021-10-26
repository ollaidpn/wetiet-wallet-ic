<?php

namespace Tests\Feature\Controllers;

use App\Models\User;
use App\Models\Refueling;

use App\Models\Shop;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class RefuelingControllerTest extends TestCase
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
    public function it_displays_index_view_with_refuelings()
    {
        $refuelings = Refueling::factory()
            ->count(5)
            ->create();

        $response = $this->get(route('refuelings.index'));

        $response
            ->assertOk()
            ->assertViewIs('app.refuelings.index')
            ->assertViewHas('refuelings');
    }

    /**
     * @test
     */
    public function it_displays_create_view_for_refueling()
    {
        $response = $this->get(route('refuelings.create'));

        $response->assertOk()->assertViewIs('app.refuelings.create');
    }

    /**
     * @test
     */
    public function it_stores_the_refueling()
    {
        $data = Refueling::factory()
            ->make()
            ->toArray();

        $response = $this->post(route('refuelings.store'), $data);

        $this->assertDatabaseHas('refuelings', $data);

        $refueling = Refueling::latest('id')->first();

        $response->assertRedirect(route('refuelings.edit', $refueling));
    }

    /**
     * @test
     */
    public function it_displays_show_view_for_refueling()
    {
        $refueling = Refueling::factory()->create();

        $response = $this->get(route('refuelings.show', $refueling));

        $response
            ->assertOk()
            ->assertViewIs('app.refuelings.show')
            ->assertViewHas('refueling');
    }

    /**
     * @test
     */
    public function it_displays_edit_view_for_refueling()
    {
        $refueling = Refueling::factory()->create();

        $response = $this->get(route('refuelings.edit', $refueling));

        $response
            ->assertOk()
            ->assertViewIs('app.refuelings.edit')
            ->assertViewHas('refueling');
    }

    /**
     * @test
     */
    public function it_updates_the_refueling()
    {
        $refueling = Refueling::factory()->create();

        $user = User::factory()->create();
        $shop = Shop::factory()->create();

        $data = [
            'amount' => $this->faker->randomNumber,
            'token' => $this->faker->text,
            'user_id' => $user->id,
            'shop_id' => $shop->id,
        ];

        $response = $this->put(route('refuelings.update', $refueling), $data);

        $data['id'] = $refueling->id;

        $this->assertDatabaseHas('refuelings', $data);

        $response->assertRedirect(route('refuelings.edit', $refueling));
    }

    /**
     * @test
     */
    public function it_deletes_the_refueling()
    {
        $refueling = Refueling::factory()->create();

        $response = $this->delete(route('refuelings.destroy', $refueling));

        $response->assertRedirect(route('refuelings.index'));

        $this->assertSoftDeleted($refueling);
    }
}
