<?php

namespace Huoshaonan\LaravelScoutElasticsearch;

use Laravel\Scout\EngineManager;
use Illuminate\Support\ServiceProvider;
use Huoshaonan\LaravelScoutElasticsearch\Engine\ElasticsearchEngine;
use Huoshaonan\LaravelScoutElasticsearch\Console\ImportCommand;
use Huoshaonan\LaravelScoutElasticsearch\Console\FlushCommand;

class ElasticsearchServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     */
    public function boot()
    {
        app(EngineManager::class)->extend('elasticsearch', function($app) {
            return new ElasticsearchEngine();
        });
    }

    /**
     * 在容器中注册绑定。
     *
     * @return void
     */
    public function register()
    {
        $this->mergeConfigFrom(
            __DIR__.'/Config/laravel-scout-elasticsearch.php', 'scout'
        );
    }
}
