<?php

use Tests\TestCase;

class SocialmediaControllerTest extends TestCase
{
    public function testSocialMediaIntegration()
    {
        $response = $this->get('/social-media');
        $response->assertStatus(200);
    }

    public function testPostToSocialMedia()
    {
        $response = $this->post('/social-media/post', [
            'content' => 'Hello World!',
        ]);
        $response->assertStatus(201);
    }

    public function testFetchSocialMediaPosts()
    {
        $response = $this->get('/social-media/posts');
        $response->assertStatus(200);
        $response->assertJsonStructure([
            '*' => ['id', 'content', 'created_at', 'updated_at'],
        ]);
    }
}