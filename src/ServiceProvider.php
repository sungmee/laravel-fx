<?php

namespace Sungmee\LaraFx;

use Illuminate\Support\ServiceProvider as LSP;

class ServiceProvider extends LSP
{
    /**
     * @var bool
     */
    protected $defer = false;

    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton('Fxr', function () {
            return new Fxr;
        });
    }

    /**
     * @return array
     */
    public function provides()
    {
        return array('Fxr');
    }
}