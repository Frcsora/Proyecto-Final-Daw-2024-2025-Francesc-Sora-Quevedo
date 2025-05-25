<?php

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class TeamsControllerTest extends TestCase
{
    use RefreshDatabase;

    public function test_team_index_200()
    {
        $user = \App\Models\User::factory()->create();
        $this->actingAs($user);
        \App\Models\Images::factory()->createLogo()->create([
            'created_by' => $user->id,
        ]);
        \App\Models\Images::factory()->createFondo()->create([
            'created_by' => $user->id,
        ]);
        $response = $this->get('/teams');
        $response->assertStatus(200);
    }

    public function test_team_create_200()
    {
        $user = \App\Models\User::factory()->create();
        $this->actingAs($user);
        \App\Models\Images::factory()->createLogo()->create([
            'created_by' => $user->id,
        ]);
        \App\Models\Images::factory()->createFondo()->create([
            'created_by' => $user->id,
        ]);
        $response = $this->get('/teams/create');
        $response->assertStatus(200);
    }
    public function test_team_create_403()
    {
        $user = \App\Models\User::factory()->create();

        \App\Models\Images::factory()->createLogo()->create([
            'created_by' => $user->id,
        ]);
        \App\Models\Images::factory()->createFondo()->create([
            'created_by' => $user->id,
        ]);
        $response = $this->get('/teams/create');
        $response->assertStatus(403);
    }

    public function test_show_returns_team()
    {
        $user = \App\Models\User::factory()->create();

        \App\Models\Images::factory()->createLogo()->create([
            'created_by' => $user->id,
        ]);
        \App\Models\Images::factory()->createFondo()->create([
            'created_by' => $user->id,
        ]);
        $game = \App\Models\Games::factory()->create();
        $team = \App\Models\Teams::factory()->create([
            'game_id' => $game->id,
            'created_by' => $user->id,
        ]);
        $response = $this->get('/teams/' . $team->id);

        $response->assertStatus(200);
    }
    public function test_edit_returns_team()
    {
        $user = \App\Models\User::factory()->create();
        $this->actingAs($user);

        \App\Models\Images::factory()->createLogo()->create([
            'created_by' => $user->id,
        ]);
        \App\Models\Images::factory()->createFondo()->create([
            'created_by' => $user->id,
        ]);
        $game = \App\Models\Games::factory()->create();
        $team = \App\Models\Teams::factory()->create([
            'game_id' => $game->id,
            'created_by' => $user->id,
        ]);
        $response = $this->get('/teams/' . $team->id . '/edit');

        $response->assertStatus(200);
    }
    public function test_edit_returns_team_403()
    {
        $user = \App\Models\User::factory()->create();

        \App\Models\Images::factory()->createLogo()->create([
            'created_by' => $user->id,
        ]);
        \App\Models\Images::factory()->createFondo()->create([
            'created_by' => $user->id,
        ]);
        $game = \App\Models\Games::factory()->create();
        $team = \App\Models\Teams::factory()->create([
            'game_id' => $game->id,
            'created_by' => $user->id,
        ]);
        $response = $this->get('/teams/' . $team->id . '/edit');

        $response->assertStatus(403);
    }
}
