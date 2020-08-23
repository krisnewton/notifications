<?php

namespace Harishariyanto\Notifications;

use Illuminate\Support\ServiceProvider;

class NotificationsServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        $this->loadRoutesFrom(__DIR__ . '/routes.php');

        $this->publishes([
            __DIR__ . '/../publishes/views'     => resource_path('views'),
            __DIR__ . '/../publishes/app'       => app_path(),
            __DIR__ . '/../publishes/database'  => database_path()
        ]);
    }
}
