<?php

declare(strict_types=1);

namespace RPWebDevelopment\WebviewDetect;

use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;

class WebviewDetectServiceProvider extends PackageServiceProvider
{
    public function configurePackage(Package $package): void
    {
        $package->name('webview-detect');
    }
}
