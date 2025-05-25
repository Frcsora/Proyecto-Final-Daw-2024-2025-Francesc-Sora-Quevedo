<?php

use Tests\TestCase;

class MatchesControllerTest extends TestCase
{
    public function testIndex()
    {
        $user = \App\Models\User::factory()->create();
        $this->actingAs($user);
        \App\Models\Images::factory()->createLogo()->create([
            'created_by' => $user->id,
        ]);
        \App\Models\Images::factory()->createFondo()->create([
            'created_by' => $user->id,
        ]);
        $response = $this->get('/matches');
        $response->assertStatus(404);
    }
    public function testCreate()
    {
        $user = \App\Models\User::factory()->create();
        $this->actingAs($user);
        \App\Models\Images::factory()->createLogo()->create([
            'created_by' => $user->id,
        ]);
        \App\Models\Images::factory()->createFondo()->create([
            'created_by' => $user->id,
        ]);
        $response = $this->get('/matches/create');
        $response->assertStatus(200);
    }
    public function testCreateNoAdmin()
    {
        $user = \App\Models\User::factory()->create();
        \App\Models\Images::factory()->createLogo()->create([
            'created_by' => $user->id,
        ]);
        \App\Models\Images::factory()->createFondo()->create([
            'created_by' => $user->id,
        ]);
        $response = $this->get('/matches/create');
        $response->assertStatus(403);
    }

    public function testShow()
    {
        $user = \App\Models\User::factory()->create();
        $this->actingAs($user);
        $game = \App\Models\Games::factory()->create();
        $team = \App\Models\Teams::factory()->create(
            [
                'game_id' => $game->id,
                'created_by' => $user->id,
            ]
        );
        $tournament = \App\Models\Tournaments::factory()->create(
            ['team_id' =>$team->id]
        );
        $match = \App\Models\Matches::factory()->create([
            'tournaments_id' => $tournament->id,
        ]);
        \App\Models\Images::factory()->createLogo()->create([
            'created_by' => $user->id,
        ]);
        \App\Models\Images::factory()->createFondo()->create([
            'created_by' => $user->id,
        ]);
        $response = $this->get('/matches/'.$match->id);
        $response->assertStatus(404);
    }

    public function testEdit()
    {
        $user = \App\Models\User::factory()->create();
        $this->actingAs($user);
        $game = \App\Models\Games::factory()->create();
        $team = \App\Models\Teams::factory()->create(
            [
                'game_id' => $game->id,
                'created_by' => $user->id,
            ]
        );
        $tournament = \App\Models\Tournaments::factory()->create(
            ['team_id' =>$team->id]
        );
        $match = \App\Models\Matches::factory()->create([
            'tournaments_id' => $tournament->id,
        ]);
        \App\Models\Images::factory()->createLogo()->create([
            'created_by' => $user->id,
        ]);
        \App\Models\Images::factory()->createFondo()->create([
            'created_by' => $user->id,
        ]);
        $response = $this->get('/matches/'.$match->id.'/edit');
        $response->assertStatus(200);
    }
    public function testEditNoAdmin()
    {
        $user = \App\Models\User::factory()->create();
        $game = \App\Models\Games::factory()->create();
        $team = \App\Models\Teams::factory()->create(
            [
                'game_id' => $game->id,
                'created_by' => $user->id,
            ]
        );
        $tournament = \App\Models\Tournaments::factory()->create(
            ['team_id' =>$team->id]
        );
        $match = \App\Models\Matches::factory()->create([
            'tournaments_id' => $tournament->id,
        ]);
        \App\Models\Images::factory()->createLogo()->create([
            'created_by' => $user->id,
        ]);
        \App\Models\Images::factory()->createFondo()->create([
            'created_by' => $user->id,
        ]);
        $response = $this->get('/matches/'.$match->id.'/edit');
        $response->assertStatus(403);
    }

    /*public function testStore()
    {
        $response = $this->post('/matches', [
            'team1_id' => 1,
            'team2_id' => 2,
            'date' => '2023-10-01',
        ]);
        $response->assertStatus(201);
    }

    public function testUpdate()
    {
        $response = $this->put('/matches/1', [
            'team1_id' => 1,
            'team2_id' => 2,
            'date' => '2023-10-02',
        ]);
        $response->assertStatus(200);
    }

    public function testDestroy()
    {
        $response = $this->delete('/matches/1');
        $response->assertStatus(204);
    }*/
}
