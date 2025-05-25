<?php

use Tests\TestCase;

class AboutusControllerTest extends TestCase
{
    public function testAboutUsPageLoadsSuccessfully()
    {
        $user = \App\Models\User::factory()->create();
        $this->actingAs($user);
        \App\Models\Images::factory()->createLogo()->create([
            'created_by' => $user->id,
        ]);
        \App\Models\Images::factory()->createFondo()->create([
            'created_by' => $user->id,
        ]);
        $response = $this->get('/aboutus');
        $response->assertStatus(200);
    }

}
