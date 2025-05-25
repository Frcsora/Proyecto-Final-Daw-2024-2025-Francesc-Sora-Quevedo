<?php

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Password;
use Tests\TestCase;

class PasswordResetLinkControllerTest extends TestCase
{
    use RefreshDatabase;

    public function test_can_send_password_reset_link()
    {
        $user = User::factory()->create(['email' => 'test@example.com']);

        $response = $this->post('/password/email', ['email' => $user->email]);

        $response->assertStatus(200);
        $this->assertEquals(1, \DB::table('password_resets')->where('email', $user->email)->count());
    }

    public function test_cannot_send_password_reset_link_to_nonexistent_email()
    {
        $response = $this->post('/password/email', ['email' => 'nonexistent@example.com']);

        $response->assertStatus(200);
        $this->assertEquals(0, \DB::table('password_resets')->where('email', 'nonexistent@example.com')->count());
    }
}
