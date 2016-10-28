<?php

namespace Aizhar777\Cell;
use Aizhar777\Cell\CellTable;
use Illuminate\Support\ServiceProvider;

class CellServiceProvider extends ServiceProvider
{

    /**
     * Indicates if loading of the provider is deferred.
     *
     * @var bool
     */
    protected $defer = true;

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {

        $this->app->singleton('cell', function() {
            return $this->app->make(CellTable::class);
        });
    }

    /**
     * Get the services provided by the provider.
     *
     * @return array
     */
    public function provides()
    {
        return ['cell'];
    }
}