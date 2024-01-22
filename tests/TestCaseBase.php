<?php

namespace Ymigval\LaravelWwwProtocolResolver\Tests;

use Orchestra\Testbench\TestCase;

class TestCaseBase extends TestCase
{
    /**
     * Get package providers.
     *
     * @param  \Illuminate\Foundation\Application  $app
     * @return array<int, class-string<\Illuminate\Support\ServiceProvider>>
     */
    protected function getPackageProviders($app): array
    {
        return [
            'Ymigval\LaravelWwwProtocolResolver\Providers\WWWProtocolResolverProvider',
        ];
    }
}
