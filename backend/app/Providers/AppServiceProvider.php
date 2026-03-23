<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
//use PDPhilip\OpenSearch\OpenClient;
use OpenSearch\ClientBuilder;
use OpenSearch\Client;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->singleton(Client::class, function ($app) {
            $config = $app['config']['database.connections.opensearch'];

            $builder = ClientBuilder::create();
            $builder->setHosts($config['hosts']);

            if (!empty($config['basic_auth']['username'])) {
                $builder->setBasicAuthentication(
                    $config['basic_auth']['username'],
                    $config['basic_auth']['password']
                );
            }

            if (isset($config['options']['ssl_verification']) && !$config['options']['ssl_verification']) {
                $builder->setSSLVerification(false);
            }

            return $builder->build();
        });
//        $this->app->singleton('opensearch', function ($app) {
//            $config = $app['config']['database.connections.opensearch'];
//            return new OpenClient($config);
//        });
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
