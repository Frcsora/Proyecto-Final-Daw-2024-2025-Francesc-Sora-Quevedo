<?php

use Tests\TestCase;

class TeamsMediasControllerTest extends TestCase
{
    public function test_teamsmedias_index_404()
    {
        $user = \App\Models\User::factory()->create();
        $this->actingAs($user);
        \App\Models\Images::factory()->createLogo()->create([
            'created_by' => $user->id,
        ]);
        \App\Models\Images::factory()->createFondo()->create([
            'created_by' => $user->id,
        ]);
        $response = $this->get('/teamsmedias');
        $response->assertStatus(404);
    }
    public function test_teamsmedias_create_200()
    {
        $user = \App\Models\User::factory()->create();
        $this->actingAs($user);
        \App\Models\Images::factory()->createLogo()->create([
            'created_by' => $user->id,
        ]);
        \App\Models\Images::factory()->createFondo()->create([
            'created_by' => $user->id,
        ]);
        $response = $this->get('/teamsmedias/create');
        $response->assertStatus(200);
    }
    public function test_teamsmedias_create_403()
    {
        $user = \App\Models\User::factory()->create();
        \App\Models\Images::factory()->createLogo()->create([
            'created_by' => $user->id,
        ]);
        \App\Models\Images::factory()->createFondo()->create([
            'created_by' => $user->id,
        ]);
        $response = $this->get('/teamsmedias/create');
        $response->assertStatus(403);
    }
    public function test_teamsmedias_show_404(){
        $user = \App\Models\User::factory()->create();
        $this->actingAs($user);
        \App\Models\Images::factory()->createLogo()->create([
            'created_by' => $user->id,
        ]);
        \App\Models\Images::factory()->createFondo()->create([
            'created_by' => $user->id,
        ]);

        $response = $this->get('/teamsmedias/' . 1);
        $response->assertStatus(404);
    }
    public function test_teamsmedias_edit_200(){
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
        $media = \App\Models\Medias::factory()->create([]);
        $teammedias = \App\Models\TeamsMedias::factory()->create([
            'media_id' => $media->id,
            'team_id' => $team->id,
        ]);
        $response = $this->get('/teamsmedias/' . $teammedias->id . '/edit');
        $response->assertStatus(200);
    }
    public function test_teamsmedias_edit_403(){
        $user = \App\Models\User::factory()->create();

        \App\Models\Images::factory()->createLogo()->create([
            'created_by' => $user->id,
        ]);
        \App\Models\Images::factory()->createFondo()->create([
            'created_by' => $user->id,
        ]);
        $game = \App\Models\Games::factory()->create([]);
        $media = \App\Models\Medias::factory()->create([]);
        $team = \App\Models\Teams::factory()->create([
            'game_id' => $game->id,
            'created_by' => $user->id,
        ]);
        $teammedias = \App\Models\TeamsMedias::factory()->create([
            'media_id' => $media->id,
            'team_id' => $team->id,
        ]);
        $response = $this->get('/teamsmedias/' . $teammedias->id . '/edit');
        $response->assertStatus(403);
    }
}
