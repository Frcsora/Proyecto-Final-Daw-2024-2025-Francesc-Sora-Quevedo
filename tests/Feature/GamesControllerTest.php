<?php

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class GamesControllerTest extends TestCase
{
    use RefreshDatabase;

    public function test_index_returns_games()
    {
        $response = $this->get('/games');
        $response->assertStatus(200);
    }

    public function test_show_returns_game()
    {
        $game = \App\Models\Games::factory()->create();
        $response = $this->get('/games/' . $game->id);
        $response->assertStatus(200);
    }

    public function test_store_creates_game()
    {
        $data = [
            'title' => 'New Game',
            'description' => 'Game description',
        ];
        $response = $this->post('/games', $data);
        $response->assertStatus(201);
        $this->assertDatabaseHas('games', $data);
    }

    public function test_update_modifies_game()
    {
        $game = \App\Models\Games::factory()->create();
        $data = [
            'title' => 'Updated Game',
            'description' => 'Updated description',
        ];
        $response = $this->put('/games/' . $game->id, $data);
        $response->assertStatus(200);
        $this->assertDatabaseHas('games', $data);
    }

    public function test_destroy_deletes_game()
    {
        $game = \App\Models\Games::factory()->create();
        $response = $this->delete('/games/' . $game->id);
        $response->assertStatus(204);
        $this->assertDatabaseMissing('games', ['id' => $game->id]);
    }
}
