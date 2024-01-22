<?php

namespace Ymigval\LaravelWwwProtocolResolver\Providers;

use Illuminate\Contracts\Container\BindingResolutionException;
use Illuminate\Contracts\Http\Kernel;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\ServiceProvider;
use Ymigval\LaravelWwwProtocolResolver\Middleware\WWWProtocolResolverMiddleware;
use Ymigval\LaravelWwwProtocolResolver\WWWProtocolResolver;

class WWWProtocolResolverProvider extends ServiceProvider
{
    private const FILE_CONFIG = __DIR__.'/../../config/wwwprotocolresolver.php';

    /**
     * Register services.
     *
     * @throws BindingResolutionException
     */
    public function register(): void
    {
        $this->mergeConfigFrom(
            self::FILE_CONFIG, 'wwwprotocolresolver'
        );

        $this->app->singleton(WWWProtocolResolver::class, function (Application $app) {
            return new WWWProtocolResolver(
                request: Request::instance(),
                type: config('wwwprotocolresolver.type'),
                use: config('wwwprotocolresolver.use'),
                mode: config('wwwprotocolresolver.mode')
            );
        });

        $this->app->make(Kernel::class)->prependMiddleware(WWWProtocolResolverMiddleware::class);
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        // Publish configuration
        $this->publishes(
            [self::FILE_CONFIG => config_path('wwwprotocolresolver.php')],
            'wwwprotocolresolver'
        );

        if (config('wwwprotocolresolver.use') === 'https') {
            URL::forceScheme('https');
        }
    }
}
