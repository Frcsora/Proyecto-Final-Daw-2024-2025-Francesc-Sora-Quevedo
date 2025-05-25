<?php

use App\Models\Images;
use Tests\TestCase;

class ImagesControllerTest extends TestCase
{
    public function testImageUpload()
    {
        $response = $this->post('/images/upload', [
            'image' => UploadedFile::fake()->image('test.jpg'),
        ]);

        $response->assertStatus(201);
        $this->assertDatabaseHas('images', [
            'filename' => 'test.jpg',
        ]);
    }

    public function testImageRetrieval()
    {
        $image = Images::factory()->create();

        $response = $this->get('/images/' . $image->id);

        $response->assertStatus(200);
        $response->assertJson([
            'id' => $image->id,
            'filename' => $image->filename,
        ]);
    }

    public function testImageDeletion()
    {
        $image = Images::factory()->create();

        $response = $this->delete('/images/' . $image->id);

        $response->assertStatus(204);
        $this->assertDatabaseMissing('images', [
            'id' => $image->id,
        ]);
    }
}
