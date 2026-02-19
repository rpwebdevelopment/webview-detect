<?php

namespace RPWebDevelopment\WebviewDetect\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * @see \RPWebDevelopment\WebviewDetect\WebviewDetect
 */
class WebviewDetect extends Facade
{
    protected static function getFacadeAccessor(): string
    {
        return \RPWebDevelopment\WebviewDetect\WebviewDetect::class;
    }
}
