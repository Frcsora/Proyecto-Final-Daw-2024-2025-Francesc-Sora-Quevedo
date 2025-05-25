<?php

use Tests\TestCase;

class PlayerControllerTest extends TestCase
{
    public function testPlayerIndex()
    {
        $user = \App\Models\User::factory()->create();
        $this->actingAs($user);
        \App\Models\Images::factory()->createLogo()->create([
            'created_by' => $user->id,
        ]);
        \App\Models\Images::factory()->createFondo()->create([
            'created_by' => $user->id,
        ]);
        $response = $this->get('/players');
        $response->assertStatus(404);
    }
    public function testPlayerCreate()
    {
        $user = \App\Models\User::factory()->create();
        $this->actingAs($user);
        \App\Models\Images::factory()->createLogo()->create([
            'created_by' => $user->id,
        ]);
        \App\Models\Images::factory()->createFondo()->create([
            'created_by' => $user->id,
        ]);
        $response = $this->get('/players/create');
        $response->assertStatus(200);
    }
    public function testPlayerCreateNoAdmin()
    {
        $user = \App\Models\User::factory()->create();

        \App\Models\Images::factory()->createLogo()->create([
            'created_by' => $user->id,
        ]);
        \App\Models\Images::factory()->createFondo()->create([
            'created_by' => $user->id,
        ]);
        $response = $this->get('/players/create');
        $response->assertStatus(403);
    }
    public function testPlayerShow()
    {
        $user = \App\Models\User::factory()->create();
        $this->actingAs($user);
        \App\Models\Images::factory()->createLogo()->create([
            'created_by' => $user->id,
        ]);
        \App\Models\Images::factory()->createFondo()->create([
            'created_by' => $user->id,
        ]);
        $game = \App\Models\Games::factory()->create([]);
        $team = \App\Models\Teams::factory()->create([
            'game_id' => $game->id,
            'created_by' => $user->id,
        ]);
        $player = \App\Models\Player::factory()->create([
            'created_by' => $user->id,
            'team_id' => $team->id,
        ]);
        $response = $this->get('/players/'. $player->id);
        $response->assertStatus(200);
    }
    public function testPlayerEdit()
    {
        $user = \App\Models\User::factory()->create();
        $this->actingAs($user);
        \App\Models\Images::factory()->createLogo()->create([
            'created_by' => $user->id,
        ]);
        \App\Models\Images::factory()->createFondo()->create([
            'created_by' => $user->id,
        ]);
        $game = \App\Models\Games::factory()->create([]);
        $team = \App\Models\Teams::factory()->create([
            'game_id' => $game->id,
            'created_by' => $user->id,
        ]);
        $player = \App\Models\Player::factory()->create([
            'created_by' => $user->id,
            'team_id' => $team->id,
        ]);
        $response = $this->get('/players/'. $player->id . '/edit');
        $response->assertStatus(200);
    }
    public function testPlayerEditnoAdmin()
    {
        $user = \App\Models\User::factory()->create();
        \App\Models\Images::factory()->createLogo()->create([
            'created_by' => $user->id,
        ]);
        \App\Models\Images::factory()->createFondo()->create([
            'created_by' => $user->id,
        ]);
        $game = \App\Models\Games::factory()->create([]);
        $team = \App\Models\Teams::factory()->create([
            'game_id' => $game->id,
            'created_by' => $user->id,
        ]);
        $player = \App\Models\Player::factory()->create([
            'created_by' => $user->id,
            'team_id' => $team->id,
        ]);
        $response = $this->get('/players/'. $player->id . '/edit');
        $response->assertStatus(403);
    }
}
