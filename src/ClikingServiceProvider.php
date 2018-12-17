<?php

namespace Megaads\Cliking;

use Megaads\Cliking\Tracking\Tracking;
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
        $request = $this->app->request;
        $tracking = new Tracking();
        $tracking->tracking($request);
        $this->loadViewsFrom(__DIR__.'/views', 'cliking');
    }

    public function register() {

    }


}
