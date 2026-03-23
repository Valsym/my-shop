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

use Illuminate\Http\Request;
// http://localhost/search?q=принтер
Route::get('/search', function (Request $request, Client $client) {
   //$query = request('q');//, 'принтер');
    //$query = $request->all();
    $query = $request->query('q');// или request('q')
//    $query = $request->get('q');
    //dd($query);
    $params = [
        'index' => 'products',
        'body'  => [
            // поиск по фразе:
//            'query' => [
//                'match' => [
//                    'name' => $query
//                ]
//            ]
        // search?q=no* (по по началу фразы)
            'query' => [
                'match_phrase_prefix' => [
                    'name' => $query
                ]
            ]
        ]
    ];
    $response = $client->search($params);
    return response()->json($response['hits']['hits']);
});
