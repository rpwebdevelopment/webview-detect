<?php

namespace RPWebDevelopment\WebviewDetect\Commands;

use Illuminate\Console\Command;

class WebviewDetectCommand extends Command
{
    public $signature = 'webview-detect';

    public $description = 'My command';

    public function handle(): int
    {
        $this->comment('All done');

        return self::SUCCESS;
    }
}
