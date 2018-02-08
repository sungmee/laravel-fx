<?php

namespace Sungmee\LaraFX;

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
        $this->app->singleton('FX', function () {
            return new FX;
        });
    }

    /**
     * @return array
     */
    public function provides()
    {
        return ['FX'];
    }
}