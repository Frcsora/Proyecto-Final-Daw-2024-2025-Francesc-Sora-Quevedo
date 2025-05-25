<?php

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class TagsControllerTest extends TestCase
{
    use RefreshDatabase;

    public function test_index_returns_tags()
    {
        $response = $this->get('/tags');

        $response->assertStatus(200);
        $response->assertJsonStructure([
            '*' => ['id', 'name', 'created_at', 'updated_at'],
        ]);
    }

    public function test_store_creates_tag()
    {
        $response = $this->post('/tags', ['name' => 'New Tag']);

        $response->assertStatus(201);
        $this->assertDatabaseHas('tags', ['name' => 'New Tag']);
    }

    public function test_show_returns_tag()
    {
        $tag = \App\Models\Tag::factory()->create();

        $response = $this->get('/tags/' . $tag->id);

        $response->assertStatus(200);
        $response->assertJson(['id' => $tag->id, 'name' => $tag->name]);
    }

    public function test_update_modifies_tag()
    {
        $tag = \App\Models\Tag::factory()->create();

        $response = $this->put('/tags/' . $tag->id, ['name' => 'Updated Tag']);

        $response->assertStatus(200);
        $this->assertDatabaseHas('tags', ['name' => 'Updated Tag']);
    }

    public function test_destroy_removes_tag()
    {
        $tag = \App\Models\Tag::factory()->create();

        $response = $this->delete('/tags/' . $tag->id);

        $response->assertStatus(204);
        $this->assertDatabaseMissing('tags', ['id' => $tag->id]);
    }
}