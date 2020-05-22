<?php

namespace Medkad\Sso;

use Illuminate\Support\ServiceProvider;

class SsoServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        if ($this->app->runningInConsole()) {
            $this->publishes([
                __DIR__ . '/config/config.php' => config_path('socialite-passport.php'),
            ], 'config');
        }
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        $this->mergeConfigFrom(__DIR__.'/config/config.php', 'socialite-passport');
        $this->mergeConfigFrom(__DIR__.'/config/services.php', 'services');
    }
}
