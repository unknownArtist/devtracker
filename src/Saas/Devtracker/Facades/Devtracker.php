<?php namespace Saas\Devtracker\Facades;

use Illuminate\Support\Facades\Facade;

class DevTracker extends Facade {

    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'devtracker';
    }

}