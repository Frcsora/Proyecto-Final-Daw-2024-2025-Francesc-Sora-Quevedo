<?php

use PHPUnit\Framework\TestCase;

class NewsControllerTest extends TestCase
{
    public function testNewsRetrieval()
    {
        $response = $this->get('/news');
        $response->assertStatus(200);
        $response->assertJsonStructure([
            '*' => ['id', 'title', 'content', 'created_at', 'updated_at'],
        ]);
    }

    public function testNewsDisplay()
    {
        $newsId = 1; // Assuming there is a news item with ID 1
        $response = $this->get("/news/{$newsId}");
        $response->assertStatus(200);
        $response->assertJson(['id' => $newsId]);
    }
}