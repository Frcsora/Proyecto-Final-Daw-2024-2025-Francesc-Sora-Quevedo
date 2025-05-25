<?php

use App\Models\Images;
use Tests\TestCase;

class ImagesControllerTest extends TestCase
{
    public function testImageIndex()
    {
        $user = \App\Models\User::factory()->create();
        $this->actingAs($user);
        \App\Models\Images::factory()->createLogo()->create([
            'created_by' => $user->id,
        ]);
        \App\Models\Images::factory()->createFondo()->create([
            'created_by' => $user->id,
        ]);
        $response = $this->get('/images');
        $response->assertStatus(200);
    }
    public function testImageIndexNoAdmin()
    {
        $user = \App\Models\User::factory()->create();
        \App\Models\Images::factory()->createLogo()->create([
            'created_by' => $user->id,
        ]);
        \App\Models\Images::factory()->createFondo()->create([
            'created_by' => $user->id,
        ]);
        $response = $this->get('/images');
        $response->assertStatus(403);
    }
    public function testImageCreate(){
        $user = \App\Models\User::factory()->create();
        $this->actingAs($user);
        \App\Models\Images::factory()->createLogo()->create([
            'created_by' => $user->id,
        ]);
        \App\Models\Images::factory()->createFondo()->create([
            'created_by' => $user->id,
        ]);
        $response = $this->get('/images/create');
        $response->assertStatus(200);
    }
    public function testImageCreateNoAdmin(){
        $user = \App\Models\User::factory()->create();
        \App\Models\Images::factory()->createLogo()->create([
            'created_by' => $user->id,
        ]);
        \App\Models\Images::factory()->createFondo()->create([
            'created_by' => $user->id,
        ]);
        $response = $this->get('/images/create');
        $response->assertStatus(403);
    }
    public function testImageShow(){
        $user = \App\Models\User::factory()->create();
        $this->actingAs($user);
        $image = \App\Models\Images::factory()->createLogo()->create([
            'created_by' => $user->id,
        ]);
        \App\Models\Images::factory()->createFondo()->create([
            'created_by' => $user->id,
        ]);
        $response = $this->get('/images/'. $image->id);
        $response->assertStatus(200);
    }
    public function testImageShowNoAdmin(){
        $user = \App\Models\User::factory()->create();
        $image = \App\Models\Images::factory()->createLogo()->create([
            'created_by' => $user->id,
        ]);
        \App\Models\Images::factory()->createFondo()->create([
            'created_by' => $user->id,
        ]);
        $response = $this->get('/images/'. $image->id);
        $response->assertStatus(403);
    }
    public function testImageEdit(){
        $user = \App\Models\User::factory()->create();
        $this->actingAs($user);
        $image = \App\Models\Images::factory()->createLogo()->create([
            'created_by' => $user->id,
        ]);
        \App\Models\Images::factory()->createFondo()->create([
            'created_by' => $user->id,
        ]);
        $response = $this->get('/images/'. $image->id .'/edit');
        $response->assertStatus(404);
    }
}
