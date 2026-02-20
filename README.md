# Laravel Webview Detect

![Packagist Version](https://img.shields.io/packagist/v/rpwebdevelopment/webview-detect)
![Packagist Downloads](https://img.shields.io/packagist/dt/rpwebdevelopment/webview-detect)
[![GitHub Tests Action Status](https://img.shields.io/github/actions/workflow/status/rpwebdevelopment/webview-detect/run-tests.yml?branch=main&label=tests&style=flat-square)](https://github.com/rpwebdevelopment/webview-detect/actions?query=workflow%3Arun-tests+branch%3Amain)
[![License: MIT](https://img.shields.io/badge/license-MIT-blueviolet.svg)](https://github.com/rpwebdevelopment/webview-detect/blob/main/LICENSE.md)

Package designed to handle parsing of User-Agent headers to determine if users are accessing applications vie WebView or not.

## Installation

You can install the package via composer:

```bash
composer require rpwebdevelopment/webview-detect
```

## Usage

Basic usage is as follows:

```php
use RPWebDevelopment\WebviewDetect\Facades\WebviewDetect;

$userAgent = 'Mozilla/5.0 (iPhone; CPU iPhone OS 13_5 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Mobile/15E148';

$isWebView = WebviewDetect::forUserAgent($userAgent)->isWebView();
```

Additionally we can initialise the facade with a request for simplified handling within controller/middleware classes:

```php
namespace App\Http\Middleware;

use Illuminate\Http\Request;
use RPWebDevelopment\WebviewDetect\Facades\WebviewDetect;

class FooMiddleware
{
    public function handle(Request $request, Closure $next)
    {
        $isWebview = WebviewDetect::forRequest($request)->isWebView();
        
        // business logic
        
        return $next($request);
    }
}
```

## Notes

While efforts have been taken to make the functionality as comprehensive and reliable as possible there will undoubtedly 
be edge cases that have been missed (or future browsers) that are incorrectly validated. As such it is recommended to treat 
responses as advisory only.

## Credits

- [Richard Porter](https://github.com/rpwebdevelopment)

## Changelog

Please see [CHANGELOG](CHANGELOG.md) for more information on what has changed recently.

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
