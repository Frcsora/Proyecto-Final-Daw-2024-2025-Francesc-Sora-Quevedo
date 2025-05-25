<?php

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ContactUsControllerTest extends TestCase
{
    use RefreshDatabase;

    public function test_contact_us_form_view(){
        $user = \App\Models\User::factory()->create();
        $this->actingAs($user);
        \App\Models\Images::factory()->createLogo()->create([
            'created_by' => $user->id,
        ]);
        \App\Models\Images::factory()->createFondo()->create([
            'created_by' => $user->id,
        ]);
        $response = $this->get('/contactus');
        $response->assertStatus(200);
    }
    public function test_contact_us_form_view_no_user(){
        $user = \App\Models\User::factory()->create();
        \App\Models\Images::factory()->createLogo()->create([
            'created_by' => $user->id,
        ]);
        \App\Models\Images::factory()->createFondo()->create([
            'created_by' => $user->id,
        ]);
        $response = $this->get('/contactus');
        $response->assertStatus(403);
    }
    /*public function test_contact_us_form_submission()
    {
        $user = \App\Models\User::factory()->create();
        $this->actingAs($user);
        $response = $this->post('/contactus', [
            'name' => 'John Doe',
            'email' => 'john@example.com',
            'message' => 'Hello, this is a test message.'
        ]);

        $response->assertStatus(200);
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
    }*/
}
