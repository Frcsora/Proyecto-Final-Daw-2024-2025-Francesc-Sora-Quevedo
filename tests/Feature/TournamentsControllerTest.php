<?php

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Tests\TestCase;
use App\Http\Middleware;
class TournamentsControllerTest extends TestCase
{
    use RefreshDatabase;


    private static string $password;

    protected function setUp(): void
    {
        parent::setUp();
        $this->withoutMiddleware(\App\Http\Middleware\VerifyCsrfToken::class);
    }

    public function test_show_returns_tournament()
    {
        $user = \App\Models\User::factory()->create();
        \App\Models\Images::factory()->createLogo()->create([
            'created_by' => $user->id,
        ]);
        \App\Models\Images::factory()->createFondo()->create([
            'created_by' => $user->id,
        ]);
        $this->actingAs($user);
        $game = \App\Models\Games::factory()->create();
        $team = \App\Models\Teams::factory()->create([
            'created_by' => $user->id,
            'game_id' => $game->id,
        ]);
        $tournament = \App\Models\Tournaments::factory()->create([
            'team_id' => $team->id
        ]);
        $response = $this->get('tournaments/' . $tournament->id);
        $response->assertStatus(200);
        $response->assertSee($tournament->name);
    }
    public function test_create_tournament(){
        $user = \App\Models\User::factory()->create();
        \App\Models\Images::factory()->createLogo()->create([
            'created_by' => $user->id,
        ]);
        \App\Models\Images::factory()->createFondo()->create([
            'created_by' => $user->id,
        ]);
        $this->actingAs($user);
        $game = \App\Models\Games::factory()->create();
        $team = \App\Models\Teams::factory()->create([
            'created_by' => $user->id,
            'game_id' => $game->id,
        ]);
        $tournament = \App\Models\Tournaments::factory()->create([
            'team_id' => $team->id
        ]);
        $response = $this->get('tournaments/create');
        $response->assertStatus(200);
    }
    public function test_edit_tournament(){
        $user = \App\Models\User::factory()->create();
        \App\Models\Images::factory()->createLogo()->create([
            'created_by' => $user->id,
        ]);
        \App\Models\Images::factory()->createFondo()->create([
            'created_by' => $user->id,
        ]);
        $this->actingAs($user);
        $game = \App\Models\Games::factory()->create();
        $team = \App\Models\Teams::factory()->create([
            'created_by' => $user->id,
            'game_id' => $game->id,
        ]);
        $tournament = \App\Models\Tournaments::factory()->create([
            'team_id' => $team->id
        ]);
        $response = $this->get('tournaments/' . $tournament->id .'edit/');
        $response->assertStatus(200);
    }

    public function test_store_creates_tournament()
    {
        $user = \App\Models\User::factory()->create();
        $game = \App\Models\Games::factory()->create();
        $team = \App\Models\Teams::factory()->create([
            'created_by' => $user->id,
            'game_id' => $game->id
        ]);
        $token = csrf_token();
        $data = \App\Models\Tournaments::factory()->raw([
            'team_id' => $team->id,
        ]);

        $response = $this->post(route('tournaments.store'), array_merge($data, ['_token' => $token]));
        $response->assertStatus(201);

        $this->assertDatabaseHas('tournaments', [
            'name' => $data['name'],
            'team_id' => $team->id,
        ]);
    }


    public function test_update_modifies_tournament()
    {
        $user = \App\Models\User::factory()->create();
        $game = \App\Models\Games::factory()->create();
        $team = \App\Models\Teams::factory()->create([
            'created_by' => $user->id,
            'game_id' => $game->id,
        ]);
        $tournament = \App\Models\Tournaments::factory()->create([
            'id' => 1,
            'name' => 'Spring Cup',
            'team_id' => $team->id,
            'event' => 'Spring Event',
            'date' => now()->toDateString(),
            'time' => now()->toTimeString(),
            'result' => null,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        $data = [
            'id' => 1,
            'name' => 'Spring Cup',
            'team_id' => 5,
            'event' => 'Spring Event',
            'date' => now()->toDateString(),
            'time' => now()->toTimeString(),
            'result' => null,
            'created_at' => now(),
            'updated_at' => now(),
        ];

        $response = $this->put('/tournaments/' . $tournament->id, $data);

        $response->assertStatus(200);
        $this->assertDatabaseHas('tournaments', $data);
    }

    public function test_destroy_deletes_tournament()
    {

        $user = \App\Models\User::factory()->create();
        $game = \App\Models\Games::factory()->create();
        $team = \App\Models\Teams::factory()->create([
            'created_by' => $user->id,
            'game_id' => $game->id,
        ]);

        $tournament = \App\Models\Tournaments::factory()->create([
            'id' => 1,
            'name' => 'Spring Cup',
            'team_id' => $team->id,
            'event' => 'Spring Event',
            'date' => now()->toDateString(),
            'time' => now()->toTimeString(),
            'result' => null,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        $response = $this->delete('/tournaments/' . $tournament->id);

        $response->assertStatus(204);
        $this->assertDatabaseMissing($tournament);
    }
}
