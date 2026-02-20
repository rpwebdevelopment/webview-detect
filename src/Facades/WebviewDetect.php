<?php

declare(strict_types=1);

namespace RPWebDevelopment\WebviewDetect\Facades;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Facade;
use RPWebDevelopment\WebviewDetect\Services\WebviewDetectService;

/**
 * @see WebviewDetectService
 *
 * @method static WebviewDetectService forRequest(Request $request)
 * @method static WebviewDetectService forUserAgent(string $userAgent)
 * @method static bool isWebView()
 */
class WebviewDetect extends Facade
{
    protected static function getFacadeAccessor(): string
    {
        return WebviewDetectService::class;
    }
}
