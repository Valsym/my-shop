<?php
// sail artisan app:index-products

namespace App\Console\Commands;

use App\Models\Product;
use Illuminate\Console\Command;
use OpenSearch\Client;

class IndexProducts extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:index-products';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    public function handle(Client $client)
    {
        $products = Product::all();
        foreach ($products as $product) {
            $params = [
                'index' => 'products',
                'id'    => $product->id,
                'body'  => [
                    'name'        => $product->name,
                    'description' => $product->description,
                    'code'        => $product->code,
                    'price'       => $product->price,
                    'suggest'     => [
                        'input' => explode(' ', $product->name) // или более сложная логика
                    ]
                ]
            ];
            $client->index($params);
        }
        $this->info('Индексация завершена');
    }
}
