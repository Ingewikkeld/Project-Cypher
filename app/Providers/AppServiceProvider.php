<?php

namespace App\Providers;

use Illuminate\Database\DatabaseManager;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton(
            'PDO',
            function ($app) {
                /** @var DatabaseManager $databaseManager */
                $databaseManager = $app[DatabaseManager::class];

                return $databaseManager->connection($databaseManager->getDefaultConnection())->getPdo();
            }
        );
    }
}
