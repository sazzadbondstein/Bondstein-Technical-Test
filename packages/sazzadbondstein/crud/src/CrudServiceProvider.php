<?php

namespace Crud;

use Illuminate\Support\Facades\Schema;
use Illuminate\Support\ServiceProvider;

class CrudServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->registerPublishables();
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        $this->loadRoutesFrom(__DIR__ . '/routes/web.php');
        $this->loadViewsFrom(__DIR__ . '/./../resources/views', namespace: 'crud');
        Schema::defaultStringLength(191);
    }

    private function registerPublishables()
    {
        $basePath = dirname(path: __Dir__);
        $arrPublishables = [
            'migrations' => [
                "$basePath/publishable/database/migrations" => database_path(path: 'migrations'),
            ]
        ];

        foreach ($arrPublishables as $group => $paths) {
            $this->publishes($paths, $group);
        }
    }
}
