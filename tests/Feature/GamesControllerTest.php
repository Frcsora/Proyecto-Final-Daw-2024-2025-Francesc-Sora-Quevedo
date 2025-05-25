<?php

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class GamesControllerTest extends TestCase
{
    use RefreshDatabase;

    public function test_index_returns_games()
    {
        $user = \App\Models\User::factory()->create();
        $this->actingAs($user);
        \App\Models\Images::factory()->createLogo()->create([
            'created_by' => $user->id,
        ]);
        \App\Models\Images::factory()->createFondo()->create([
            'created_by' => $user->id,
        ]);
        $response = $this->get(route('games.index'));
        $response->assertStatus(200);
    }
    public function test_index_returns_games_no_admin()
    {
        $user = \App\Models\User::factory()->create();
        \App\Models\Images::factory()->createLogo()->create([
            'created_by' => $user->id,
        ]);
        \App\Models\Images::factory()->createFondo()->create([
            'created_by' => $user->id,
        ]);
        $response = $this->get(route('games.index'));
        $response->assertStatus(403);
    }

    public function test_show_returns_game()
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

        $response = $this->get('/games/' . $game->id . '/show');
        $response->assertStatus(404);
    }
    public function test_create_form(){
        $user = \App\Models\User::factory()->create();
        $this->actingAs($user);
        \App\Models\Images::factory()->createLogo()->create([
            'created_by' => $user->id,
        ]);
        \App\Models\Images::factory()->createFondo()->create([
            'created_by' => $user->id,
        ]);
        $response = $this->get('/games/create');
        $response->assertStatus(200);
    }
    public function test_create_form_no_admin(){
        $user = \App\Models\User::factory()->create();
        \App\Models\Images::factory()->createLogo()->create([
            'created_by' => $user->id,
        ]);
        \App\Models\Images::factory()->createFondo()->create([
            'created_by' => $user->id,
        ]);
        $response = $this->get('/games/create');
        $response->assertStatus(403);
    }
    public function test_edit_form(){
        $user = \App\Models\User::factory()->create();
        $this->actingAs($user);
        \App\Models\Images::factory()->createLogo()->create([
            'created_by' => $user->id,
        ]);
        \App\Models\Images::factory()->createFondo()->create([
            'created_by' => $user->id,
        ]);
        $game = \App\Models\Games::factory()->create();
        $response = $this->get('games/' . $game->id . '/edit');
        $response->assertStatus(200);
    }
    public function test_edit_form_no_admin(){
        $user = \App\Models\User::factory()->create();
        \App\Models\Images::factory()->createLogo()->create([
            'created_by' => $user->id,
        ]);
        \App\Models\Images::factory()->createFondo()->create([
            'created_by' => $user->id,
        ]);
        $game = \App\Models\Games::factory()->create();
        $response = $this->get('games/' . $game->id . '/edit');
        $response->assertStatus(403);
    }
    /*public function test_store_creates_game()
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
    }*/
}
