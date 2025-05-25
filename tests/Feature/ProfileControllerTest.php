<?php

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ProfileControllerTest extends TestCase
{
    use RefreshDatabase;

    public function test_profile_can_be_viewed()
    {
        $response = $this->get('/profile');

        $response->assertStatus(200);
    }

    public function test_profile_can_be_updated()
    {
        $response = $this->put('/profile', [
            'name' => 'New Name',
            'email' => 'newemail@example.com',
        ]);

        $response->assertStatus(302);
        $this->assertDatabaseHas('users', [
            'name' => 'New Name',
            'email' => 'newemail@example.com',
        ]);
    }

    public function test_profile_update_requires_name()
    {
        $response = $this->put('/profile', [
            'email' => 'newemail@example.com',
        ]);

        $response->assertSessionHasErrors('name');
    }

    public function test_profile_update_requires_email()
    {
        $response = $this->put('/profile', [
            'name' => 'New Name',
        ]);

        $response->assertSessionHasErrors('email');
    }
}