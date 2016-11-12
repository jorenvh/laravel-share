<?php

namespace Jorenvh\Share\Providers;

use Illuminate\Contracts\Foundation\Application;
use Illuminate\Support\ServiceProvider;

class ShareServiceProvider extends ServiceProvider
{
    /**
     * Service providers to register
     *
     * @var array
     */
    protected $providers = [
        // service providers to register
    ];

    /**
     * @var \Illuminate\Contracts\Foundation\Application
     */
    private $app;

    /**
     * @param \Illuminate\Contracts\Foundation\Application $app
     */
    public function __construct(Application $app)
    {
        $this->app = $app;

        $this->providers = collect($this->providers);
    }

    /**
     * Bootstrap the application services.
     */
    public function boot()
    {
       $this->publishes([
           __DIR__.'/../config/mbr.php' => config_path('mbr.php'),
       ], 'config');
     }

    /**
     * Register the application services.
     */
    public function register()
    {
        $this->mergeConfigFrom(__DIR__.'/../config/mbr.php', 'mbr');

        if(config('mbr.enabled')) {
            $this->registerProviders();
        }
    }

    /**
     * Register dependency provider
     */
    private function registerProviders()
    {
        $this->providers->each(function($provider) {
            $this->app->register($provider);
        });
    }
}
