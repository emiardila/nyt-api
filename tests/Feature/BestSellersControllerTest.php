<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Support\Facades\Http;

class BestSellersControllerTest extends TestCase
{
    /**
     * Test the index method.
     *
     * @return void
     */
    public function testIndex()
    {
        // Mock the HTTP request to the external API
        Http::fake([
            'api.nytimes.com/*' => Http::response([
                'status' => 'OK',
                'results' => [
                    // Mocked response data
                ]
            ], 200)
        ]);

        // Construct the URL with query parameters
        $queryParams = http_build_query([
            'author' => 'John Doe',
            'isbn' => ['1234567890', '3310000001'], // Valid ISBN
            'title' => 'Sample Title',
            'offset' => 20
        ]);

        // Construct the URL with query parameters
        $url = '/api/1/nyt/best-sellers?' . $queryParams;

        // Send a GET request to the index method
        $response = $this->getJson($url);

        // Assert that the response has a 200 status code
        $response->assertStatus(200);
    }

    /**
     * Test the badRequest method.
     *
     * @return void
     */
    public function testBadRequest()
    {
        // Construct the URL with query parameters
        $queryParams = http_build_query([
            'author' => 'John Doe',
            'isbn' => ['1234567890', '33100'], // Invalid ISBN
            'title' => 'Sample Title',
            'offset' => 20
        ]);

        // Construct the URL with query parameters
        $url = '/api/1/nyt/best-sellers?' . $queryParams;

        // Send a GET request to the index method
        $response = $this->getJson($url);

        // Assert that the response has a 200 status code
        $response->assertStatus(422);
    }   
    
}