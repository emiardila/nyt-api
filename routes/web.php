<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\v1\BestSellersController;

// Welcome route
Route::get('/', function () {
    return response()->json([
        'message' => 'Welcome to the NYT Best Sellers API',
        'main_routes' => [
            '/api/1/nyt/best-sellers' => 'Get a list of best sellers',
            '/api/1/nyt/best-sellers/bad-request' => 'Get a bad request response'
        ]
    ]);
});

// Main route
Route::get('/api/1/nyt/best-sellers', [BestSellersController::class, 'index']);

// Bad request route
Route::get('/api/1/nyt/best-sellers/bad-request', [BestSellersController::class, 'badRequest']);