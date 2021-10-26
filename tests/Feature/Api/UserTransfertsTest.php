<?php

namespace Tests\Feature\Api;

use App\Models\User;
use App\Models\Transfert;

use Tests\TestCase;
use Laravel\Sanctum\Sanctum;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class UserTransfertsTest extends TestCase
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
    public function it_gets_user_transferts()
    {
        $user = User::factory()->create();
        $transferts = Transfert::factory()
            ->count(2)
            ->create([
                'user_id' => $user->id,
            ]);

        $response = $this->getJson(route('api.users.transferts.index', $user));

        $response->assertOk()->assertSee($transferts[0]->roken);
    }

    /**
     * @test
     */
    public function it_stores_the_user_transferts()
    {
        $user = User::factory()->create();
        $data = Transfert::factory()
            ->make([
                'user_id' => $user->id,
            ])
            ->toArray();

        $response = $this->postJson(
            route('api.users.transferts.store', $user),
            $data
        );

        $this->assertDatabaseHas('transferts', $data);

        $response->assertStatus(201)->assertJsonFragment($data);

        $transfert = Transfert::latest('id')->first();

        $this->assertEquals($user->id, $transfert->user_id);
    }
}
