<?php

namespace RPWebDevelopment\WebviewDetect\Traits;

trait HasDeviceDetection
{
    private function isIOS(): bool
    {
        return (
            (
                $this->matchUserAgent('iPhone|iphone|iPad;|iPod')
                && !$this->matchUserAgent('x86_64|i386')
            )
            || (
                $this->matchUserAgent(' Darwin')
                && !$this->matchUserAgent('X11;')
                && !$this->matchUserAgent('x86_64|i386|Mac')
            )
        );
    }

    private function isAndroid(): bool
    {
        return (
            $this->matchUserAgent('Android')
            || (
                $this->matchUserAgent('X11; Linux x86_64|X11; Linux aarch64|X11; U; U; Linux x86_64|X11; Linux; U;|X11; Linux zbov')
                && !$this->matchUserAgent('kded/|kioclient|queror|Goanna|Epiphany|Brick|Iceweasel|SeaMonkey|Thunderbird|Qt|Arora|Ubuntu|Debian|Fedora|Linux Mint|elementary|Raspbian|Slackware|ArchLinux|Gentoo')
            )
        );
    }

    private function isIOSDesktopMode(): bool
    {
        return $this->matchUserAgent('Mac OS X')
            && $this->matchUserAgent('/Mac\sOS\sX.*iOS/');
    }

    private function isAndroidDesktopMode(): bool
    {
        return $this->matchUserAgent('/X11\;(?:[U\;\s]+)?\sLinux/')
            && $this->matchUserAgent('Version/4.0 Chrome/|SamsungBrowser|Miui|XiaoMi|EdgA|Puffin|UCBrowser|JioPages|Ecosia android');
    }

    private function isOtherMobile(): bool
    {
        return (
            $this->matchUserAgent('WPDesktop;')
            || $this->matchUserAgent('mobile|tablet')
            || $this->matchUserAgent('BlackBerry|BB10;|MIDP|PlayBook|Windows Phone|Windows Mobile|Windows CE|IEMobile|Opera Mini|OPiOS|Opera Mobi|CrKey armv|Kindle|Silk/|Bada|Tizen|Lumia|Symbian|SymbOS|(Series|PalmOS|PalmSource|Dolfin|Crosswalk|Obigo|MQQBrowser|CriOS|WhatsApp/')
            || $this->matchUserAgent('nokia|playstation|watch')
        );
    }

    private function isMobileDevice(): bool
    {
        return (
            $this->isIOS()
            || $this->isAndroid()
            || $this->isIOSDesktopMode()
            || $this->isAndroidDesktopMode()
            || $this->isOtherMobile()
        );
    }
}
