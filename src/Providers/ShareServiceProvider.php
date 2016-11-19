<?php

namespace Jorenvh\Share\Providers;

use Illuminate\Contracts\Foundation\Application;
use Illuminate\Support\ServiceProvider;
use Jorenvh\Share\Share;

class ShareServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     */
    public function boot()
    {
        $this->publishes([
            __DIR__ . '/../../config/laravel-share.php' => config_path('laravel-share.php'),
        ], 'config');

        $this->publishes([
            __DIR__ . '/../../public/js/share.js' => public_path('js/share.js')
        ], 'assets');

        $this->loadTranslationsFrom(__DIR__ . '/../../resources/lang/', 'laravel-share');
    }

    /**
     * Register the application services.
     */
    public function register()
    {
        $this->app->bind('share', function () {
            return new Share();
        });

        $this->mergeConfigFrom(__DIR__ . '/../../config/laravel-share.php', 'laravel-share');
    }
}
