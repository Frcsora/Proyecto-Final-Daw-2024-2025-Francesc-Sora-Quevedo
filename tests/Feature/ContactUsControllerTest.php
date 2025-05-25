<?php

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ContactUsControllerTest extends TestCase
{
    use RefreshDatabase;

    public function test_contact_us_form_submission()
    {
        $response = $this->post('/contactus', [
            'name' => 'John Doe',
            'email' => 'john@example.com',
            'message' => 'Hello, this is a test message.'
        ]);

        $response->assertStatus(200);
        $this->assertDatabaseHas('contact_messages', [
            'name' => 'John Doe',
            'email' => 'john@example.com',
            'message' => 'Hello, this is a test message.'
        ]);
    }

    public function test_contact_us_form_validation()
    {
        $response = $this->post('/contactus', [
            'name' => '',
            'email' => 'invalid-email',
            'message' => ''
        ]);

        $response->assertStatus(422);
        $response->assertJsonValidationErrors(['name', 'email', 'message']);
    }
}
