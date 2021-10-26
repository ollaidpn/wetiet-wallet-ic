<?php

namespace Tests\Feature\Api;

use App\Models\User;
use App\Models\Refueling;

use App\Models\Shop;

use Tests\TestCase;
use Laravel\Sanctum\Sanctum;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class RefuelingTest extends TestCase
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
    public function it_gets_refuelings_list()
    {
        $refuelings = Refueling::factory()
            ->count(5)
            ->create();

        $response = $this->getJson(route('api.refuelings.index'));

        $response->assertOk()->assertSee($refuelings[0]->token);
    }

    /**
     * @test
     */
    public function it_stores_the_refueling()
    {
        $data = Refueling::factory()
            ->make()
            ->toArray();

        $response = $this->postJson(route('api.refuelings.store'), $data);

        $this->assertDatabaseHas('refuelings', $data);

        $response->assertStatus(201)->assertJsonFragment($data);
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

        $response = $this->putJson(
            route('api.refuelings.update', $refueling),
            $data
        );

        $data['id'] = $refueling->id;

        $this->assertDatabaseHas('refuelings', $data);

        $response->assertOk()->assertJsonFragment($data);
    }

    /**
     * @test
     */
    public function it_deletes_the_refueling()
    {
        $refueling = Refueling::factory()->create();

        $response = $this->deleteJson(
            route('api.refuelings.destroy', $refueling)
        );

        $this->assertSoftDeleted($refueling);

        $response->assertNoContent();
    }
}
