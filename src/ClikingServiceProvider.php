<?php

namespace Megaads\Cliking;

use Illuminate\Support\ServiceProvider;

class ClikingServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        if (!$this->app->routesAreCached()) {
            include __DIR__ . '/routes.php';
        }
    }

    public function register() {

    }
}
