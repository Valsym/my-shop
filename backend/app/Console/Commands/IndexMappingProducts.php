<?php
// sail artisan app:index-mapping-products

namespace App\Console\Commands;

use App\Models\Product;
use Illuminate\Console\Command;
use OpenSearch\Client;

class IndexMappingProducts extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:index-mapping-products';

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
        $params = [
            'index' => 'products',
            'body' => [
                'settings' => [
                    'analysis' => [
                        'analyzer' => [
                            'partial_analyzer' => [
                                'tokenizer' => 'standard',
                                'filter'   => ['lowercase', 'partial_filter']
                            ]
                        ],
                        'filter' => [
                            'partial_filter' => [
                                'type'     => 'edge_ngram',
                                'min_gram' => 2,
                                'max_gram' => 20
                            ]
                        ]
                    ]
                ],
                'mappings' => [
                    'properties' => [
                        'name' => [
                            'type' => 'text',
                            'analyzer' => 'partial_analyzer',
                            'search_analyzer' => 'standard'
                        ],
                        'description' => [
                            'type' => 'text',
                            'analyzer' => 'partial_analyzer',
                            'search_analyzer' => 'standard'
                        ],
                        'code' => [
                            'type' => 'keyword'   // для точных совпадений
                        ],
                        'price' => [
                            'type' => 'float'
                        ],
                        'suggest' => [
                            'type' => 'completion'
                        ],
                    ]
                ],
            ]
        ];

        // Создаём индекс (если не существует)
        if (!$client->indices()->exists(['index' => 'products'])) {
            $client->indices()->create($params);
            $this->info('Индекс-маппинг анализатор создан. Запусти индексацию...');
        }
    }

}
