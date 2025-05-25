<?php

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class MessageControllerTest extends TestCase
{
    use RefreshDatabase;

    public function testSendMessage()
    {
        $response = $this->post('/messages', [
            'recipient_id' => 1,
            'content' => 'Hello, this is a test message.'
        ]);

        $response->assertStatus(201);
        $this->assertDatabaseHas('messages', [
            'recipient_id' => 1,
            'content' => 'Hello, this is a test message.'
        ]);
    }

    public function testReceiveMessages()
    {
        $response = $this->get('/messages/1');

        $response->assertStatus(200);
        $response->assertJsonStructure([
            '*' => ['id', 'recipient_id', 'content', 'created_at', 'updated_at']
        ]);
    }
}