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
Route::get('/search-full', function (Request $request, Client $client) {
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


// Пагинация: ?q=принтер&from=0&size=2
//Фильтр: ?q=принтер&price_min=10000&price_max=50000
Route::get('/search', function (Request $request, Client $client) {
    $query = $request->query('q');
    $from = $request->query('from', 0);
    $size = $request->query('size', 10);
    $priceMin = $request->query('price_min');
    $priceMax = $request->query('price_max');

    $body = [
        'from' => (int) $from,
        'size' => (int) $size,
        'query' => [
            'bool' => [
                'must' => [
                    ['multi_match' => [
                        'query'  => $query,
                        'fields' => ['name^3', 'description']
                    ]]
                ]
            ]
        ]
    ];

    if ($priceMin !== null || $priceMax !== null) {
        $range = [];
        if ($priceMin !== null) $range['gte'] = (float) $priceMin;
        if ($priceMax !== null) $range['lte'] = (float) $priceMax;
        $body['query']['bool']['filter'][] = ['range' => ['price' => $range]];
    }

    $params = ['index' => 'products', 'body' => $body];
    $response = $client->search($params);

    return response()->json([
        'total' => $response['hits']['total']['value'],
        'hits' => collect($response['hits']['hits'])->pluck('_source'),
    ]);
});
