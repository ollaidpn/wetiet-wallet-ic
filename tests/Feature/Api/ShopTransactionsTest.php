<?php

namespace Tests\Feature\Api;

use App\Models\User;
use App\Models\Shop;
use App\Models\Transaction;

use Tests\TestCase;
use Laravel\Sanctum\Sanctum;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ShopTransactionsTest extends TestCase
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
    public function it_gets_shop_transactions()
    {
        $shop = Shop::factory()->create();
        $transactions = Transaction::factory()
            ->count(2)
            ->create([
                'shop_id' => $shop->id,
            ]);

        $response = $this->getJson(
            route('api.shops.transactions.index', $shop)
        );

        $response->assertOk()->assertSee($transactions[0]->type);
    }

    /**
     * @test
     */
    public function it_stores_the_shop_transactions()
    {
        $shop = Shop::factory()->create();
        $data = Transaction::factory()
            ->make([
                'shop_id' => $shop->id,
            ])
            ->toArray();

        $response = $this->postJson(
            route('api.shops.transactions.store', $shop),
            $data
        );

        $this->assertDatabaseHas('transactions', $data);

        $response->assertStatus(201)->assertJsonFragment($data);

        $transaction = Transaction::latest('id')->first();

        $this->assertEquals($shop->id, $transaction->shop_id);
    }
}
