<?php

namespace RPWebDevelopment\WebviewDetect\Facades;

use Illuminate\Support\Facades\Facade;
use RPWebDevelopment\WebviewDetect\Services\WebviewDetectService;

/**
 * @see \RPWebDevelopment\WebviewDetect\WebviewDetect
 */
class WebviewDetect extends Facade
{
    protected static function getFacadeAccessor(): string
    {
        return WebviewDetectService::class;
    }
}
