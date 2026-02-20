<?php

declare(strict_types=1);

namespace RPWebDevelopment\WebviewDetect\Services;

use Exception;
use Illuminate\Http\Request;
use RPWebDevelopment\WebviewDetect\Traits\HasBrowserDetection;
use RPWebDevelopment\WebviewDetect\Traits\HasDeviceDetection;

class WebviewDetectService
{
    use HasDeviceDetection;
    use HasBrowserDetection;

    protected false|string $userAgent = false;

    public function forRequest(Request $request): WebviewDetectService
    {
        $userAgent = $request->header('User-Agent', '');

        return $this;
    }

    public function forUserAgent(string $userAgent): WebviewDetectService
    {
        $this->userAgent = $userAgent;

        return $this;
    }

    /**
     * @throws Exception
     */
    public function isWebView(): bool
    {
        if (!$this->userAgent) {
            throw new Exception("Webview detection userAgent not set");
        }

        return ($this->isAndroidWebView() || $this->isAppleWebView());
    }

    public function test(string $test)
    {
        $this->userAgent = $test;

        var_dump(($this->isAndroidWebView() || $this->isAppleWebView()));
    }

    private function matchUserAgent($data): array|bool
    {
        if (empty($data)) {
            return false;
        }

        if (str_starts_with($data, '/') && str_ends_with($data, '/')) {
            if (preg_match($data, $this->userAgent, $matches)) {
                for ($i = 0; $i <= 2; $i++) {
                    if (!isset($matches[$i])) {
                        $matches[$i] = 0;
                    }
                }

                return $matches;
            }
        } else {
            $parts = explode('|', $data);
            foreach ($parts as $part) {
                if (strpos($this->userAgent, $part) !== false) {
                    return true;
                }
            }
        }

        return false;
    }

    private function getChromiumVersion(): false|int
    {
        if ($this->matchUserAgent('CriOS/')) {
            return false;
        }

        $parts = $this->matchUserAgent('/(Chrome|Chromium|CriOS|CrMo)\/([0-9]+)\.?/');

        return (!empty($parts[2])) ? (int) $parts[2] : false;
    }

    private function isAppleWebView(): bool
    {
        if ($this->isIOS()) {
            return (
                $this->matchUserAgent('/\s\((iPhone|iphone|iPad|iPod);.*\)\sAppleWebKit\/[.0-9]+\s\(KHTML\,\slike Gecko\)\s(?!CriOS|FxiOS|OPiOS|EdgiOS)(?!Version).*Mobile\/([0-9A-Z]+)/')
                || (
                    !$this->getBrowserName()
                    && $this->matchUserAgent('MobileSafari/')
                    && $this->matchUserAgent('CFNetwork/')
                )
            );
        }

        return false;
    }

    private function isAndroidWebView(): bool
    {
        $isAndroid = $this->isAndroid();

        if (!$isAndroid) {
            return false;
        }

        return (
            $this->matchUserAgent('; wv|;FB|FB_IAB|OKApp|DuckDuckGo')
            || (
                !$this->isChrome()
                && $this->getChromiumVersion()
                && $this->matchUserAgent('/like\sGecko\)\sVersion\/[.0-9]+\sChrome\/[.0-9]+\s/')
            )
        );
    }
}
