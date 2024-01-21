<?php

namespace Ymigval\LaravelWwwprotocolresolver\Providers;

use Illuminate\Support\ServiceProvider;

class WWWProtocolResolverProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        $this->publishes([
            __DIR__.'/../../config/wwwprotocolresolver.php' => config_path('wwwprotocolresolver.php'),
        ]);
    }
}
