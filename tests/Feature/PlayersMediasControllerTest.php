<?php

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class PlayersMediasControllerTest extends TestCase
{
    use RefreshDatabase;

    public function test_index_returns_404_response()
    {
        $user = \App\Models\User::factory()->create();
        $this->actingAs($user);
        \App\Models\Images::factory()->createLogo()->create([
            'created_by' => $user->id,
        ]);
        \App\Models\Images::factory()->createFondo()->create([
            'created_by' => $user->id,
        ]);
        $response = $this->get('/playersmedias');
        $response->assertStatus(404);
    }
    public function test_create_returns_successful_response()
    {
        $user = \App\Models\User::factory()->create();
        $this->actingAs($user);
        \App\Models\Images::factory()->createLogo()->create([
            'created_by' => $user->id,
        ]);
        \App\Models\Images::factory()->createFondo()->create([
            'created_by' => $user->id,
        ]);
        $response = $this->get('/playersmedias/create');
        $response->assertStatus(200);
    }
    public function test_create_returns_403_response()
    {
        $user = \App\Models\User::factory()->create();
        \App\Models\Images::factory()->createLogo()->create([
            'created_by' => $user->id,
        ]);
        \App\Models\Images::factory()->createFondo()->create([
            'created_by' => $user->id,
        ]);
        $response = $this->get('/playersmedias/create');
        $response->assertStatus(403);
    }

    public function test_show_returns_404_response(){
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
        $player = \App\Models\Player::factory()->create([
            'created_by' => $user->id,
            'team_id' => $team->id,
        ]);
        $media = \App\Models\Medias::factory()->create();
        $playersmedias = \App\Models\PlayersMedias::factory()->create([
            'player_id' => $player->id,
            'media_id' => $media->id,
        ]);
        $response = $this->get('/playersmedias/'. $playersmedias->id);
        $response->assertStatus(404);
    }

    /*public function test_store_creates_media_successfully()
    {
        $response = $this->post('/players/media', [
            'player_id' => 1,
            'media_url' => 'http://example.com/media.mp4',
        ]);

        $response->assertStatus(201);
        $this->assertDatabaseHas('player_media', [
            'player_id' => 1,
            'media_url' => 'http://example.com/media.mp4',
        ]);
    }

    public function test_show_returns_media_details()
    {
        $media = \App\Models\PlayerMedia::factory()->create();

        $response = $this->get('/players/media/' . $media->id);

        $response->assertStatus(200)
                 ->assertJson([
                     'id' => $media->id,
                     'player_id' => $media->player_id,
                     'media_url' => $media->media_url,
                 ]);
    }

    public function test_update_modifies_media_successfully()
    {
        $media = \App\Models\PlayerMedia::factory()->create();

        $response = $this->put('/players/media/' . $media->id, [
            'media_url' => 'http://example.com/new-media.mp4',
        ]);

        $response->assertStatus(200);
        $this->assertDatabaseHas('player_media', [
            'id' => $media->id,
            'media_url' => 'http://example.com/new-media.mp4',
        ]);
    }

    public function test_destroy_removes_media_successfully()
    {
        $media = \App\Models\PlayerMedia::factory()->create();

        $response = $this->delete('/players/media/' . $media->id);

        $response->assertStatus(204);
        $this->assertDatabaseMissing('player_media', [
            'id' => $media->id,
        ]);
    }*/
}
