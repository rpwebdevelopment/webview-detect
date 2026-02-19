<?php

namespace RPWebDevelopment\WebviewDetect;

use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;
use RPWebDevelopment\WebviewDetect\Commands\WebviewDetectCommand;

class WebviewDetectServiceProvider extends PackageServiceProvider
{
    public function configurePackage(Package $package): void
    {
        $package
            ->name('webview-detect')
            ->hasConfigFile()
            ->hasViews()
            ->hasMigration('create_webview_detect_table')
            ->hasCommand(WebviewDetectCommand::class);
    }
}
