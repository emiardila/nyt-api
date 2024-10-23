<?php

namespace App\Http\Controllers\v1;

use App\Http\Controllers\Controller;
use App\Http\Requests\BestSellersRequestValidation;
use Illuminate\Support\Facades\Http;



class BestSellersController extends Controller
{   
    
    private $api_key;
    private $api_url;

    /**
     * BestSellersController constructor.
     */
    public function __construct()
    {
        $this->api_key = env('NYT_API_KEY');
        $this->api_url = env('NYT_API_URL');
    }

    /**
     * Display a listing of the resource.
     *
     * @param BestSellersRequestValidation $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function index(BestSellersRequestValidation $request)
    {
        $validated = $request->validated();        
        
        // Convert comma-separated ISBN string to an array
        $isbnString = $validated['isbn'] ?? '';
        $isbnArray = $isbnString != '' ? implode(';', $isbnString) : [];

        $endpoint = $this->api_url.'svc/books/v3/lists/best-sellers/history.json';
        $response = Http::get($endpoint,[
            'api-key' => $this->api_key,
            'author' => $validated['author'] ?? null, 
            'isbn' => $isbnArray,
            'title' => $validated['title'] ?? null, 
            'offset' => $validated['offset'] ?? null
        ]);

        return response()->json($response->body());
    }

    /**
     * Display a Bad Request response.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function badRequest()
    {
        return response()->json([
            'error' => 'Bad Request',
            'message' => 'The request could not be understood or was missing required parameters. Please ensure all required fields are provided and try again.'
        ], 400);
    }

}
