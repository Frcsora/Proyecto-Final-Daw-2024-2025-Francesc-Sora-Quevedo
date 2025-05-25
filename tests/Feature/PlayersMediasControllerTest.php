<?php

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class PlayersMediasControllerTest extends TestCase
{
    use RefreshDatabase;

    public function test_index_returns_successful_response()
    {
        $response = $this->get('/players/media');

        $response->assertStatus(200);
    }

    public function test_store_creates_media_successfully()
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
    }
}