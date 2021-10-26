<?php

namespace Tests\Feature\Api;

use App\Models\User;
use App\Models\Tokenizer;

use Tests\TestCase;
use Laravel\Sanctum\Sanctum;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class TokenizerTest extends TestCase
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
    public function it_gets_tokenizers_list()
    {
        $tokenizers = Tokenizer::factory()
            ->count(5)
            ->create();

        $response = $this->getJson(route('api.tokenizers.index'));

        $response->assertOk()->assertSee($tokenizers[0]->token_code);
    }

    /**
     * @test
     */
    public function it_stores_the_tokenizer()
    {
        $data = Tokenizer::factory()
            ->make()
            ->toArray();

        $response = $this->postJson(route('api.tokenizers.store'), $data);

        $this->assertDatabaseHas('tokenizers', $data);

        $response->assertStatus(201)->assertJsonFragment($data);
    }

    /**
     * @test
     */
    public function it_updates_the_tokenizer()
    {
        $tokenizer = Tokenizer::factory()->create();

        $user = User::factory()->create();

        $data = [
            'token_code' => $this->faker->text,
            'user_id' => $user->id,
        ];

        $response = $this->putJson(
            route('api.tokenizers.update', $tokenizer),
            $data
        );

        $data['id'] = $tokenizer->id;

        $this->assertDatabaseHas('tokenizers', $data);

        $response->assertOk()->assertJsonFragment($data);
    }

    /**
     * @test
     */
    public function it_deletes_the_tokenizer()
    {
        $tokenizer = Tokenizer::factory()->create();

        $response = $this->deleteJson(
            route('api.tokenizers.destroy', $tokenizer)
        );

        $this->assertSoftDeleted($tokenizer);

        $response->assertNoContent();
    }
}
