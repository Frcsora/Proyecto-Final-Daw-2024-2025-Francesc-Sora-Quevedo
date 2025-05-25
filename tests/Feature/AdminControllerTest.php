<?php

use Tests\TestCase;

class AdminControllerTest extends TestCase
{
    public function testAdminIndex()
    {
        $response = $this->get('/administracion');
        $response->assertStatus(200);
    }


}
