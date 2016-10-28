<?php

namespace Aizhar777\Cell\Facades;

use Illuminate\Support\Facades\Facade;

class Cell extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'cell';
    }
}