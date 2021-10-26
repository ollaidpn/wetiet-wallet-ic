<?php

namespace Tests\Feature\Api;

use App\Models\User;
use App\Models\Transfert;

use Tests\TestCase;
use Laravel\Sanctum\Sanctum;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class TransfertTest extends TestCase
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
    public function it_gets_transferts_list()
    {
        $transferts = Transfert::factory()
            ->count(5)
            ->create();

        $response = $this->getJson(route('api.transferts.index'));

        $response->assertOk()->assertSee($transferts[0]->roken);
    }

    /**
     * @test
     */
    public function it_stores_the_transfert()
    {
        $data = Transfert::factory()
            ->make()
            ->toArray();

        $response = $this->postJson(route('api.transferts.store'), $data);

        $this->assertDatabaseHas('transferts', $data);

        $response->assertStatus(201)->assertJsonFragment($data);
    }

    /**
     * @test
     */
    public function it_updates_the_transfert()
    {
        $transfert = Transfert::factory()->create();

        $user = User::factory()->create();

        $data = [
            'to_phone' => $this->faker->randomNumber,
            'contact_id' => $this->faker->randomNumber(0),
            'amount' => $this->faker->randomNumber,
            'roken' => $this->faker->text,
            'user_id' => $user->id,
        ];

        $response = $this->putJson(
            route('api.transferts.update', $transfert),
            $data
        );

        $data['id'] = $transfert->id;

        $this->assertDatabaseHas('transferts', $data);

        $response->assertOk()->assertJsonFragment($data);
    }

    /**
     * @test
     */
    public function it_deletes_the_transfert()
    {
        $transfert = Transfert::factory()->create();

        $response = $this->deleteJson(
            route('api.transferts.destroy', $transfert)
        );

        $this->assertSoftDeleted($transfert);

        $response->assertNoContent();
    }
}
