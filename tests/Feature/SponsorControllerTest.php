<?php

use Tests\TestCase;

class SponsorControllerTest extends TestCase
{
    public function test_sponsor_index()
    {
        $response = $this->get('/sponsors');
        $response->assertStatus(200);
    }

    public function test_sponsor_show()
    {
        $response = $this->get('/sponsors/1');
        $response->assertStatus(200);
    }

    public function test_sponsor_create()
    {
        $response = $this->post('/sponsors', [
            'name' => 'Test Sponsor',
            'url' => 'http://test-sponsor.com',
        ]);
        $response->assertStatus(201);
    }

    public function test_sponsor_update()
    {
        $response = $this->put('/sponsors/1', [
            'name' => 'Updated Sponsor',
            'url' => 'http://updated-sponsor.com',
        ]);
        $response->assertStatus(200);
    }

    public function test_sponsor_delete()
    {
        $response = $this->delete('/sponsors/1');
        $response->assertStatus(204);
    }
}