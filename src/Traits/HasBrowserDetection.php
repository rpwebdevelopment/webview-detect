<?php

declare(strict_types=1);

namespace RPWebDevelopment\WebviewDetect\Traits;

use RPWebDevelopment\WebviewDetect\Properties\MiscBrowsers;
use RPWebDevelopment\WebviewDetect\Properties\MobileBrowsers;

trait HasBrowserDetection
{
    use MobileBrowsers;
    use MiscBrowsers;

    private function getBrowserName(): false|string
    {
        if ($this->isChrome()) {
            return $this->isChromium() ? 'Chromium' : 'Chrome';
        }

        if ($this->isFirefox()) {
            return 'Firefox';
        }

        if ($this->isDarwin()) {
            return 'Darwin Browser';
        }

        if ($this->isMobileBrowser()) {
            return 'Mobile Browser';
        }

        if ($this->isMiscBrowser()) {
            return 'Misc Browser';
        }

        return false;
    }

    private function isChrome(): bool
    {
        return (
            $this->matchUserAgent('/Gecko\)\s(Chrome|CrMo)\/(\d+\.\d+\.\d+\.\d+)\s(?:Mobile)?(?:\/[.0-9A-Za-z]+\s|\s)?Safari\/[.0-9]+$/')
            && !$this->matchUserAgent('SalamWeb| Valve | GOST')
        );
    }

    private function isChromium(): bool
    {
        return $this->matchUserAgent('Chrome/|Chromium/|CriOS/|CrMo/');
    }

    private function isFirefox(): bool
    {
        return $this->matchUserAgent('Firefox/')
            && !$this->matchUserAgent('Focus/|FxiOS|Waterfox|Ghostery:');
    }

    private function isDarwin(): bool
    {
        $parts = $this->matchUserAgent('/^(.*)(\/[.0-9]+|\s\(unknown\sversion\))(.*)\sCFNetwork\/[.0-9]+\sDarwin\/[.0-9]+/');

        return !empty($parts[1]);
    }

    private function isMobileBrowser(): bool
    {
        return (bool) $this->getMobileBrowser();
    }

    private function isMiscBrowser(): bool
    {
        return (bool) $this->getMiscBrowser();
    }

    private function getMobileBrowser(): false|string
    {
        if (
            $this->isChrome()
            || ($this->isFirefox() && $this->matchUserAgent('/\)\sGecko\/[.0-9]+\sFirefox\/[.0-9]+$/'))
        ) {
            return false;
        }

        return $this->getListBrowser($this->mobileBrowsers);
    }

    private function getMiscBrowser(): false|string
    {
        return $this->getListBrowser($this->miscBrowsers);
    }

    private function getListBrowser(array $list): false|string
    {
        foreach ($list as $browser) {
            if (
                $this->matchUserAgent($browser['match'])
                && !$this->matchUserAgent($browser['exclude'])
            ) {
                $matches = $this->matchUserAgent($browser['matches']);
                $num = $browser['num'];
                if (is_array($matches) ? (float)$matches[$num] : 0) {
                    return $browser['name'];
                }
            }
        }

        return false;
    }
}
