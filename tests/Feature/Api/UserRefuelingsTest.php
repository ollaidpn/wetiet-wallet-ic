<?php

namespace Tests\Feature\Api;

use App\Models\User;
use App\Models\Refueling;

use Tests\TestCase;
use Laravel\Sanctum\Sanctum;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class UserRefuelingsTest extends TestCase
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
    public function it_gets_user_refuelings()
    {
        $user = User::factory()->create();
        $refuelings = Refueling::factory()
            ->count(2)
            ->create([
                'user_id' => $user->id,
            ]);

        $response = $this->getJson(route('api.users.refuelings.index', $user));

        $response->assertOk()->assertSee($refuelings[0]->token);
    }

    /**
     * @test
     */
    public function it_stores_the_user_refuelings()
    {
        $user = User::factory()->create();
        $data = Refueling::factory()
            ->make([
                'user_id' => $user->id,
            ])
            ->toArray();

        $response = $this->postJson(
            route('api.users.refuelings.store', $user),
            $data
        );

        $this->assertDatabaseHas('refuelings', $data);

        $response->assertStatus(201)->assertJsonFragment($data);

        $refueling = Refueling::latest('id')->first();

        $this->assertEquals($user->id, $refueling->user_id);
    }
}
