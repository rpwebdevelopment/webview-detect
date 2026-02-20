<?php

use RPWebDevelopment\WebviewDetect\Services\WebviewDetectService;

it('can correctly identify non webview requests', function () {
    $userAgents = [
        'Word/16.15.18070902 CFNetwork/901.1 Darwin/17.6.0 (x86_64)',
        'Safari/10600.1.25 CFNetwork/720.0.7 Darwin/14.0.0 (x86_64)',
        'Safari/9537.86.7.8 CFNetwork/673.6 Darwin/13.4.0 (x86_64) (MacBookAir6%2C1)',
        '1Password%207/70007000 CFNetwork/902.1 Darwin/17.7.0 (x86_64)',
        'Safari/6531.9 CFNetwork/454.4 Darwin/10.0.0 (i386) (MacBook4%2C1)',
        'com.apple.Notes.SharingExtension/555.10.42 CFNetwork/760.7 Darwin/15.6.0 (x86_64)',
        'com.apple.Safari.SearchHelper/10600.8.3 CFNetwork/720.5.7 Darwin/14.5.0 (x86_64)',
        'com.apple.WebKit.Networking/10603.3.8 CFNetwork/720.5.7 Darwin/14.5.0 (x86_64)',
        'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/16.5 Safari/605.1.15 Ddg/17.5',
        'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/605.1.15 (KHTML, like Gecko)',
        'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/67.0.3396.123 Safari/537.36 EdgA/42.0.0.2305',
        'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_12_4) AppleWebKit/604.3.5 (KHTML, like Gecko) Version/10.1 Safari/602.1 EdgiOS/44.11.15',
        'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 YaSearchBrowser/23.78 BroPP/1.0 YaSearchApp/23.78 webOmni SA/3 Safari/537.36',
        'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/112.0.0.0 YaBrowser/23.5.5.53.00 SA/3 Safari/537.36',
        'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 YaApp_Android/23.76 YaSearchBrowser/23.76 BroPP/1.0 SA/3 Safari/537.36',
        'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/108.0.5359.128 Safari/537.36 OPX/2.1',
        'Opera/9.80 (X11; Linux zbov) Presto/2.11.355 Version/12.10',
        'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/67.0.3396.123 Safari/537.36 EdgA/42.0.0.2305',
        'Mozilla/5.0 (Linux; Android 7.0; SM-G950F Build/NRD90M) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/63.0.3239.111 Mobile Safari/537.36 EdgA/41.0.0.1563',
        'Mozilla/5.0 (Linux; Android 9; vivo 1901) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/77.0.3865.116 Mobile Safari/537.36 EdgA/45.02.4.4922',
        'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_12_4) AppleWebKit/604.3.5 (KHTML, like Gecko) Version/10.1 Safari/602.1 EdgiOS/44.11.15',
        'Mozilla/5.0 (X11; CrOS x86_64 14388.61.0) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/91.0.4472.147 Safari/537.36',
        'Mozilla/5.0 (X11; CrOS aarch64 14388.61.0) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/99.0.4844.57 Safari/537.36',
        'Mozilla/5.0 (X11; CrOS armv7l 14388.61.0) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/99.0.4844.57 Safari/537.36',
        'Mozilla/5.0 (X11; Chromium OS x86_64 14388.61.0) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/99.0.4844.57 Safari/537.36',
        'Mozilla/5.0 (Linux; U; Android 2.1.1; de-de; SAMSUNG-SGH-I997R Build/GINGERBREAD) AppleWebKit/533.1 (KHTML, like Gecko) Version/4.0 Mobile Safari/533.1',
        'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:3.4) Goanna/20180412 PaleMoon/27.9.0',
        'Mozilla/4.0 (compatible; Linux 2.6.22) NetFront/3.4 Kindle/2.0 (screen 600x800)',
        'Mozilla/5.0 (BB10; Touch) AppleWebKit/537.35+ (KHTML, like Gecko) Version/10.3.3.2205 Mobile Safari/537.35+',
        'Mozilla/5.0 (X11; FreeBSD amd64) AppleWebKit/534.34 (KHTML, like Gecko) konqueror/5.0.97 Safari/534.34',
        'Mozilla/5.0 (SMART-TV; LINUX; Tizen 3.0) AppleWebKit/538.1 (KHTML, like Gecko) Version/3.0 TV Safari/538.1',
        'Mozilla/5.0 (GNU; rv:1.9.1.7) Gecko/20100107 IceCat/3.6 (like Firefox/3.6)',
        'Mozilla/4.5 (compatible; iCab 2.8.1; Macintosh; I; PPC)',
    ];

    $service = new WebviewDetectService();

    foreach ($userAgents as $userAgent) {
        $result = $service->forUserAgent($userAgent);

        expect($result)->toBeFalse();
    }
});
