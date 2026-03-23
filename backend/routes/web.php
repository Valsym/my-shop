<?php

use Illuminate\Support\Facades\Route;
//use PDPhilip\OpenSearch\Facades\OpenSearch;

Route::get('/', function () {
    return view('welcome');
});



use OpenSearch\Client;

Route::get('/test-opensearch', function (Client $client) {
    try {
        $health = $client->cluster()->health();
        return response()->json($health);
    } catch (\Exception $e) {
        return response()->json(['error' => $e->getMessage()], 500);
    }
});
