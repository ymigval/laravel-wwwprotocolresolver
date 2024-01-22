<?php

namespace Ymigval\LaravelWwwProtocolResolver;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Str;
use Spatie\Url\Url;

class WWWProtocolResolver
{
    public function __construct(protected Request $request, protected int $type, protected ?string $use, protected ?string $mode)
    {
    }

    public function getType(): int
    {
        $typeDefault = 301;

        if ($this->type != $typeDefault && $this->type != 302) {
            $this->type = $typeDefault;
        }

        return $this->type;
    }

    public function getUse(): ?string
    {
        if ($this->use !== 'http' && $this->use !== 'https') {
            $this->use = null;
        }

        return $this->use;
    }

    public function getMode(): ?string
    {
        if ($this->mode !== 'with_www' && $this->mode !== 'without_www') {
            $this->mode = null;
        }

        return $this->mode;
    }

    public function isPreferredScheme(): bool
    {
        if (is_null($this->getUse())) {
            return true;
        }

        return $this->request->getScheme() === $this->getUse();
    }

    public function isPreferredMode(): bool
    {
        if (is_null($this->getMode())) {
            return true;
        }

        if ($this->getMode() === 'with_www' && Str::of($this->request->getHost())->startsWith('www.')) {
            return true;
        } elseif ($this->getMode() === 'without_www' && ! Str::of($this->request->getHost())->startsWith('www.')) {
            return true;
        } else {
            return false;
        }
    }

    public function redirect(): \Illuminate\Http\RedirectResponse
    {
        $url = Url::fromString($this->request->url());

        if (! $this->isPreferredScheme()) {
            $url = $url->withScheme($this->getUse());
        }

        if (! $this->isPreferredMode()) {
            if ($this->getMode() === 'with_www') {
                $url = $url->withHost(Str::of($url->getHost())->prepend('www.'));
            } elseif ($this->getMode() === 'without_www') {
                $url = $url->withHost(Str::of($url->getHost())->replaceMatches('#^www\.#', ''));
            }
        }

        return Redirect::to($url->__toString(), $this->getType());
    }
}
