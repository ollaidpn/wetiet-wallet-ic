<?php

namespace Tests\Feature\Controllers;

use App\Models\User;
use App\Models\Tokenizer;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class TokenizerControllerTest extends TestCase
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
    public function it_displays_index_view_with_tokenizers()
    {
        $tokenizers = Tokenizer::factory()
            ->count(5)
            ->create();

        $response = $this->get(route('tokenizers.index'));

        $response
            ->assertOk()
            ->assertViewIs('app.tokenizers.index')
            ->assertViewHas('tokenizers');
    }

    /**
     * @test
     */
    public function it_displays_create_view_for_tokenizer()
    {
        $response = $this->get(route('tokenizers.create'));

        $response->assertOk()->assertViewIs('app.tokenizers.create');
    }

    /**
     * @test
     */
    public function it_stores_the_tokenizer()
    {
        $data = Tokenizer::factory()
            ->make()
            ->toArray();

        $response = $this->post(route('tokenizers.store'), $data);

        $this->assertDatabaseHas('tokenizers', $data);

        $tokenizer = Tokenizer::latest('id')->first();

        $response->assertRedirect(route('tokenizers.edit', $tokenizer));
    }

    /**
     * @test
     */
    public function it_displays_show_view_for_tokenizer()
    {
        $tokenizer = Tokenizer::factory()->create();

        $response = $this->get(route('tokenizers.show', $tokenizer));

        $response
            ->assertOk()
            ->assertViewIs('app.tokenizers.show')
            ->assertViewHas('tokenizer');
    }

    /**
     * @test
     */
    public function it_displays_edit_view_for_tokenizer()
    {
        $tokenizer = Tokenizer::factory()->create();

        $response = $this->get(route('tokenizers.edit', $tokenizer));

        $response
            ->assertOk()
            ->assertViewIs('app.tokenizers.edit')
            ->assertViewHas('tokenizer');
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

        $response = $this->put(route('tokenizers.update', $tokenizer), $data);

        $data['id'] = $tokenizer->id;

        $this->assertDatabaseHas('tokenizers', $data);

        $response->assertRedirect(route('tokenizers.edit', $tokenizer));
    }

    /**
     * @test
     */
    public function it_deletes_the_tokenizer()
    {
        $tokenizer = Tokenizer::factory()->create();

        $response = $this->delete(route('tokenizers.destroy', $tokenizer));

        $response->assertRedirect(route('tokenizers.index'));

        $this->assertSoftDeleted($tokenizer);
    }
}
