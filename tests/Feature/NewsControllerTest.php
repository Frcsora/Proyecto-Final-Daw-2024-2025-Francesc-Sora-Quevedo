<?php

use Tests\TestCase;

class NewsControllerTest extends TestCase
{
    public function testNewsIndex()
    {
        $user = \App\Models\User::factory()->create();
        $this->actingAs($user);
        \App\Models\Images::factory()->createLogo()->create([
            'created_by' => $user->id,
        ]);
        \App\Models\Images::factory()->createFondo()->create([
            'created_by' => $user->id,
        ]);
        $response = $this->get('/news');
        $response->assertStatus(200);

    }
    public function testNewsCreate()
    {
        $user = \App\Models\User::factory()->create();
        $this->actingAs($user);
        \App\Models\Images::factory()->createLogo()->create([
            'created_by' => $user->id,
        ]);
        \App\Models\Images::factory()->createFondo()->create([
            'created_by' => $user->id,
        ]);
        $response = $this->get('/news/create');
        $response->assertStatus(200);
    }
    public function testNewsCreateNoAdmin()
    {
        $user = \App\Models\User::factory()->create();
        \App\Models\Images::factory()->createLogo()->create([
            'created_by' => $user->id,
        ]);
        \App\Models\Images::factory()->createFondo()->create([
            'created_by' => $user->id,
        ]);
        $response = $this->get('/news/create');
        $response->assertStatus(403);
    }
    public function testNewsShow()
    {
        $user = \App\Models\User::factory()->create();
        $this->actingAs($user);
        \App\Models\Images::factory()->createLogo()->create([
            'created_by' => $user->id,
        ]);
        \App\Models\Images::factory()->createFondo()->create([
            'created_by' => $user->id,
        ]);
        $news = \App\Models\News::factory()->create([
            'created_by' => $user->id,
        ]);
        $response = $this->get("/news/".$news->id);
        $response->assertStatus(200);
    }
    public function testNewsEdit()
    {
        $user = \App\Models\User::factory()->create();
        $this->actingAs($user);
        \App\Models\Images::factory()->createLogo()->create([
            'created_by' => $user->id,
        ]);
        \App\Models\Images::factory()->createFondo()->create([
            'created_by' => $user->id,
        ]);
        $news = \App\Models\News::factory()->create([
            'created_by' => $user->id,
        ]);
        $response = $this->get("/news/".$news->id.'/edit');
        $response->assertStatus(200);
    }
    public function testNewsEditNoAdmin()
    {
        $user = \App\Models\User::factory()->create();
        \App\Models\Images::factory()->createLogo()->create([
            'created_by' => $user->id,
        ]);
        \App\Models\Images::factory()->createFondo()->create([
            'created_by' => $user->id,
        ]);
        $news = \App\Models\News::factory()->create([
            'created_by' => $user->id,
        ]);
        $response = $this->get("/news/".$news->id.'/edit');
        $response->assertStatus(403);
    }
}
