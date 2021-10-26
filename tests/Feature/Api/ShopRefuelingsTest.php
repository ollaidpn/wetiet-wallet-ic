<?php

namespace Tests\Feature\Api;

use App\Models\User;
use App\Models\Shop;
use App\Models\Refueling;

use Tests\TestCase;
use Laravel\Sanctum\Sanctum;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ShopRefuelingsTest extends TestCase
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
    public function it_gets_shop_refuelings()
    {
        $shop = Shop::factory()->create();
        $refuelings = Refueling::factory()
            ->count(2)
            ->create([
                'shop_id' => $shop->id,
            ]);

        $response = $this->getJson(route('api.shops.refuelings.index', $shop));

        $response->assertOk()->assertSee($refuelings[0]->token);
    }

    /**
     * @test
     */
    public function it_stores_the_shop_refuelings()
    {
        $shop = Shop::factory()->create();
        $data = Refueling::factory()
            ->make([
                'shop_id' => $shop->id,
            ])
            ->toArray();

        $response = $this->postJson(
            route('api.shops.refuelings.store', $shop),
            $data
        );

        $this->assertDatabaseHas('refuelings', $data);

        $response->assertStatus(201)->assertJsonFragment($data);

        $refueling = Refueling::latest('id')->first();

        $this->assertEquals($shop->id, $refueling->shop_id);
    }
}
