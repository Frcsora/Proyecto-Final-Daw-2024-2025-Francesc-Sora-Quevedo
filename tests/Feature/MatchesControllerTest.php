<?php

use Tests\TestCase;

class MatchesControllerTest extends TestCase
{
    public function testIndex()
    {
        $response = $this->get('/matches');
        $response->assertStatus(200);
    }

    public function testShow()
    {
        $response = $this->get('/matches/1');
        $response->assertStatus(200);
    }

    public function testStore()
    {
        $response = $this->post('/matches', [
            'team1_id' => 1,
            'team2_id' => 2,
            'date' => '2023-10-01',
        ]);
        $response->assertStatus(201);
    }

    public function testUpdate()
    {
        $response = $this->put('/matches/1', [
            'team1_id' => 1,
            'team2_id' => 2,
            'date' => '2023-10-02',
        ]);
        $response->assertStatus(200);
    }

    public function testDestroy()
    {
        $response = $this->delete('/matches/1');
        $response->assertStatus(204);
    }
}