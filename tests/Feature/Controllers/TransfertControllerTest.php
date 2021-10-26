<?php

namespace Tests\Feature\Controllers;

use App\Models\User;
use App\Models\Transfert;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class TransfertControllerTest extends TestCase
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
    public function it_displays_index_view_with_transferts()
    {
        $transferts = Transfert::factory()
            ->count(5)
            ->create();

        $response = $this->get(route('transferts.index'));

        $response
            ->assertOk()
            ->assertViewIs('app.transferts.index')
            ->assertViewHas('transferts');
    }

    /**
     * @test
     */
    public function it_displays_create_view_for_transfert()
    {
        $response = $this->get(route('transferts.create'));

        $response->assertOk()->assertViewIs('app.transferts.create');
    }

    /**
     * @test
     */
    public function it_stores_the_transfert()
    {
        $data = Transfert::factory()
            ->make()
            ->toArray();

        $response = $this->post(route('transferts.store'), $data);

        $this->assertDatabaseHas('transferts', $data);

        $transfert = Transfert::latest('id')->first();

        $response->assertRedirect(route('transferts.edit', $transfert));
    }

    /**
     * @test
     */
    public function it_displays_show_view_for_transfert()
    {
        $transfert = Transfert::factory()->create();

        $response = $this->get(route('transferts.show', $transfert));

        $response
            ->assertOk()
            ->assertViewIs('app.transferts.show')
            ->assertViewHas('transfert');
    }

    /**
     * @test
     */
    public function it_displays_edit_view_for_transfert()
    {
        $transfert = Transfert::factory()->create();

        $response = $this->get(route('transferts.edit', $transfert));

        $response
            ->assertOk()
            ->assertViewIs('app.transferts.edit')
            ->assertViewHas('transfert');
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

        $response = $this->put(route('transferts.update', $transfert), $data);

        $data['id'] = $transfert->id;

        $this->assertDatabaseHas('transferts', $data);

        $response->assertRedirect(route('transferts.edit', $transfert));
    }

    /**
     * @test
     */
    public function it_deletes_the_transfert()
    {
        $transfert = Transfert::factory()->create();

        $response = $this->delete(route('transferts.destroy', $transfert));

        $response->assertRedirect(route('transferts.index'));

        $this->assertSoftDeleted($transfert);
    }
}
