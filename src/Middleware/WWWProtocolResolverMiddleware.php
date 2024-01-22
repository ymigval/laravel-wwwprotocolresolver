<?php

namespace Ymigval\LaravelWwwProtocolResolver\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Ymigval\LaravelWwwProtocolResolver\WWWProtocolResolver;

class WWWProtocolResolverMiddleware
{
    public function __construct(protected WWWProtocolResolver $protocolResolver)
    {
    }

    public function handle(Request $request, Closure $next): Response
    {
        if (! $this->protocolResolver->isPreferredScheme() || ! $this->protocolResolver->isPreferredMode()) {
            return $this->protocolResolver->redirect();
        }

        return $next($request);
    }
}
