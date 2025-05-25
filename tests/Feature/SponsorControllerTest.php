<?php

use Tests\TestCase;

class SponsorControllerTest extends TestCase
{
    public function test_sponsor_index()
    {
        $user = \App\Models\User::factory()->create();
        $this->actingAs($user);
        \App\Models\Images::factory()->createLogo()->create([
            'created_by' => $user->id,
        ]);
        \App\Models\Images::factory()->createFondo()->create([
            'created_by' => $user->id,
        ]);
        $response = $this->get('/sponsors');
        $response->assertStatus(200);
    }
    public function test_sponsor_index_403()
    {
        $user = \App\Models\User::factory()->create();
        \App\Models\Images::factory()->createLogo()->create([
            'created_by' => $user->id,
        ]);
        \App\Models\Images::factory()->createFondo()->create([
            'created_by' => $user->id,
        ]);
        $response = $this->get('/sponsors');
        $response->assertStatus(403);
    }
    public function test_sponsor_create()
    {
        $user = \App\Models\User::factory()->create();
        $this->actingAs($user);
        \App\Models\Images::factory()->createLogo()->create([
            'created_by' => $user->id,
        ]);
        \App\Models\Images::factory()->createFondo()->create([
            'created_by' => $user->id,
        ]);
        $response = $this->get('/sponsors/create');
        $response->assertStatus(200);
    }
    public function test_sponsor_create_403()
    {
        $user = \App\Models\User::factory()->create();
        \App\Models\Images::factory()->createLogo()->create([
            'created_by' => $user->id,
        ]);
        \App\Models\Images::factory()->createFondo()->create([
            'created_by' => $user->id,
        ]);
        $response = $this->get('/sponsors/create');
        $response->assertStatus(403);
    }

    public function test_sponsor_show()
    {
        $user = \App\Models\User::factory()->create();
        $this->actingAs($user);
        \App\Models\Images::factory()->createLogo()->create([
            'created_by' => $user->id,
        ]);
        \App\Models\Images::factory()->createFondo()->create([
            'created_by' => $user->id,
        ]);
        $sponsor = \App\Models\Sponsor::factory()->create([
            'created_by' => $user->id,
        ]);
        $response = $this->get('/sponsors/'.$sponsor->id);
        $response->assertStatus(404);
    }
    public function test_sponsor_edit()
    {
        $user = \App\Models\User::factory()->create();
        $this->actingAs($user);
        \App\Models\Images::factory()->createLogo()->create([
            'created_by' => $user->id,
        ]);
        \App\Models\Images::factory()->createFondo()->create([
            'created_by' => $user->id,
        ]);
        $sponsor = \App\Models\Sponsor::factory()->create([
            'created_by' => $user->id,
        ]);
        $response = $this->get('/sponsors/'.$sponsor->id . '/edit');
        $response->assertStatus(200);
    }
    public function test_sponsor_edit_403()
    {
        $user = \App\Models\User::factory()->create();
        \App\Models\Images::factory()->createLogo()->create([
            'created_by' => $user->id,
        ]);
        \App\Models\Images::factory()->createFondo()->create([
            'created_by' => $user->id,
        ]);
        $sponsor = \App\Models\Sponsor::factory()->create([
            'created_by' => $user->id,
        ]);
        $response = $this->get('/sponsors/'.$sponsor->id . '/edit');
        $response->assertStatus(403);
    }
}
