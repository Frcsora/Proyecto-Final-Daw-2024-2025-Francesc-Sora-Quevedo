<?php

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class TeamsControllerTest extends TestCase
{
    use RefreshDatabase;

    public function test_index_returns_teams()
    {
        $response = $this->get('/teams');

        $response->assertStatus(200);
        $response->assertJsonStructure([
            '*' => ['id', 'name', 'created_at', 'updated_at'],
        ]);
    }

    public function test_show_returns_team()
    {
        $team = \App\Models\Team::factory()->create();

        $response = $this->get('/teams/' . $team->id);

        $response->assertStatus(200);
        $response->assertJson([
            'id' => $team->id,
            'name' => $team->name,
        ]);
    }

    public function test_store_creates_team()
    {
        $data = ['name' => 'New Team'];

        $response = $this->post('/teams', $data);

        $response->assertStatus(201);
        $this->assertDatabaseHas('teams', $data);
    }

    public function test_update_modifies_team()
    {
        $team = \App\Models\Team::factory()->create();
        $data = ['name' => 'Updated Team'];

        $response = $this->put('/teams/' . $team->id, $data);

        $response->assertStatus(200);
        $this->assertDatabaseHas('teams', $data);
    }

    public function test_destroy_deletes_team()
    {
        $team = \App\Models\Team::factory()->create();

        $response = $this->delete('/teams/' . $team->id);

        $response->assertStatus(204);
        $this->assertDatabaseMissing('teams', ['id' => $team->id]);
    }
}