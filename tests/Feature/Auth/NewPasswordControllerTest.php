<?php

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Password;
use Tests\TestCase;

class NewPasswordControllerTest extends TestCase
{
    use RefreshDatabase;

    public function test_can_show_new_password_form()
    {
        $response = $this->get('/password/reset');

        $response->assertStatus(200);
    }

    public function test_can_reset_password()
    {
        $user = User::factory()->create();

        $response = $this->post('/password/email', ['email' => $user->email]);

        $response->assertStatus(200);
        $this->assertDatabaseHas('password_resets', ['email' => $user->email]);
    }

    public function test_can_update_password()
    {
        $user = User::factory()->create();
        $token = Password::createToken($user);

        $response = $this->post('/password/reset', [
            'email' => $user->email,
            'token' => $token,
            'password' => 'newpassword',
            'password_confirmation' => 'newpassword',
        ]);

        $response->assertStatus(302);
        $this->assertTrue(Hash::check('newpassword', $user->fresh()->password));
    }
}
