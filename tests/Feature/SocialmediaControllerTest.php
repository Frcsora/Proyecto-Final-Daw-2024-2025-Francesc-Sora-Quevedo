<?php

use Tests\TestCase;

class SocialmediaControllerTest extends TestCase
{
    public function test_socialmedia_index_successful(){
        $user = \App\Models\User::factory()->create();
        $this->actingAs($user);
        \App\Models\Images::factory()->createLogo()->create([
            'created_by' => $user->id,
        ]);
        \App\Models\Images::factory()->createFondo()->create([
            'created_by' => $user->id,
        ]);
        $response = $this->get('/socialmedia');
        $response->assertStatus(200);
    }
    public function test_socialmedia_index_403(){
        $user = \App\Models\User::factory()->create();
        \App\Models\Images::factory()->createLogo()->create([
            'created_by' => $user->id,
        ]);
        \App\Models\Images::factory()->createFondo()->create([
            'created_by' => $user->id,
        ]);
        $response = $this->get('/socialmedia');
        $response->assertStatus(403);
    }
    public function test_socialmedia_create_successful(){
        $user = \App\Models\User::factory()->create();
        $this->actingAs($user);
        \App\Models\Images::factory()->createLogo()->create([
            'created_by' => $user->id,
        ]);
        \App\Models\Images::factory()->createFondo()->create([
            'created_by' => $user->id,
        ]);
        $response = $this->get('/socialmedia/create');
        $response->assertStatus(200);
    }
    public function test_socialmedia_create_403(){
        $user = \App\Models\User::factory()->create();
        \App\Models\Images::factory()->createLogo()->create([
            'created_by' => $user->id,
        ]);
        \App\Models\Images::factory()->createFondo()->create([
            'created_by' => $user->id,
        ]);
        $response = $this->get('/socialmedia/create');
        $response->assertStatus(403);
    }
    public function test_socialmedia_show_404(){
        $user = \App\Models\User::factory()->create();
        $this->actingAs($user);
        \App\Models\Images::factory()->createLogo()->create([
            'created_by' => $user->id,
        ]);
        \App\Models\Images::factory()->createFondo()->create([
            'created_by' => $user->id,
        ]);
        $media = \App\Models\Medias::factory()->create();
        $socialmedia = \App\Models\Socialmedia::factory()->create([
            'id_media' => $media->id,
            'created_by' => $user->id,
        ]);
        $response = $this->get('/socialmedia/'. $socialmedia->id);
        $response->assertStatus(404);
    }
    public function test_socialmedia_edit_successful(){
        $user = \App\Models\User::factory()->create();
        $this->actingAs($user);
        \App\Models\Images::factory()->createLogo()->create([
            'created_by' => $user->id,
        ]);
        \App\Models\Images::factory()->createFondo()->create([
            'created_by' => $user->id,
        ]);
        $media = \App\Models\Medias::factory()->create();
        $socialmedia = \App\Models\Socialmedia::factory()->create([
            'id_media' => $media->id,
            'created_by' => $user->id,
        ]);
        $response = $this->get('/socialmedia/'. $socialmedia->id . '/edit');
        $response->assertStatus(200);
    }
    public function test_socialmedia_edit_403(){
        $user = \App\Models\User::factory()->create();
        \App\Models\Images::factory()->createLogo()->create([
            'created_by' => $user->id,
        ]);
        \App\Models\Images::factory()->createFondo()->create([
            'created_by' => $user->id,
        ]);
        $media = \App\Models\Medias::factory()->create();
        $socialmedia = \App\Models\Socialmedia::factory()->create([
            'id_media' => $media->id,
            'created_by' => $user->id,
        ]);
        $response = $this->get('/socialmedia/'. $socialmedia->id . '/edit');
        $response->assertStatus(403);

    }
}
