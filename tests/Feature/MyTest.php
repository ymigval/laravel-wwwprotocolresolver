<?php

namespace Ymigval\LaravelWwwProtocolResolver\Tests\Feature;

use Illuminate\Support\Facades\App;
use Ymigval\LaravelWwwProtocolResolver\Tests\TestCaseBase;
use Ymigval\LaravelWwwProtocolResolver\WWWProtocolResolver;

class MyTest extends TestCaseBase
{
    public function test_check_scheme()
    {
        //$test = $this->app->make(WWWProtocolResolver::class);
        //dd($test->redirect());

        dd($this->get('/')->status());
    }
}
