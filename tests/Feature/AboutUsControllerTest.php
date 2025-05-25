<?php

use Tests\TestCase;

class AboutusControllerTest extends TestCase
{
    public function testAboutUsPageLoadsSuccessfully()
    {
        $response = $this->get('/aboutus');
        $response->assertStatus(200);
    }

    public function testAboutUsContentIsCorrect()
    {
        $response = $this->get('/aboutus');
        $response->assertSee('About Us');
    }
}
