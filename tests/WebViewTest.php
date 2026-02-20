<?php

use RPWebDevelopment\WebviewDetect\Services\WebviewDetectService;

it('can correctly identify iOS webview requests', function () {
    $userAgents = [
        'Mozilla/5.0 (iPhone; CPU iPhone OS 13_5 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Mobile/15E148',
        'Mozilla/5.0 (iPad; CPU OS 10_3_4 like Mac OS X) AppleWebKit/600.1.4 (KHTML, like Gecko) GSA/9.0.60246 Mobile/14G61 Safari/600.1.4',
        'Mozilla/5.0 (iPad; CPU OS 13_3 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Mobile/15E148 OPT/2.5.3',
        'Mozilla/5.0 (iPhone; CPU iPhone OS 14_1 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Mobile/15E148 SRCHAPP',
        'Mozilla/5.0 (iPhone; CPU iPhone OS 13_5_1 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Mobile/15E148 Version/13.5.1 Safari/605.1.15 AlohaBrowser/2.23.3',
        'Mozilla/5.0 (iPhone; CPU iPhone OS 13_7 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Mobile/15E148 LightSpeed [FBAN/MessengerLiteForiOS;FBAV/248.0.0.16.123;FBBV/193428402;FBDV/iPhone11,2;FBMD/iPhone;FBSN/iOS;FBSV/13.7;FBSS/3;FBCR/;FBID/phone;FBLC/cs_CZ;FBOP/0]',
        'Mozilla/5.0 (iPhone; CPU iPhone OS 11_3_1 like Mac OS X) AppleWebKit/605.1.33 (KHTML, like Gecko) Mobile/15E302 YaBrowser/19.5.2.38.10 YaApp_iOS/25.00 YaApp_iOS_Browser/25.00 Safari/604.1',
        'Mozilla/5.0 (iPhone; CPU iPhone OS 16_2 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Mobile/15E148 YaBrowser/23.7.0.2091.10 YaApp_iOS/2307.0 YaApp_iOS_Browser/2307.0 Safari/604.1 SA/3',
        'Mozilla/5.0 (iPhone; CPU iPhone OS 16_5_1 like Mac OS X; ru) AppleWebKit/537.51.1 (KHTML, like Gecko) Mobile/20F75 UCBrowser/11.3.5.1203 Mobile',
        'Mozilla/5.0 (iPhone; CPU iPhone OS 16_2 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko)  Mobile/15E148 Safari/604.1',
        'Mozilla/5.0 (iPhone; CPU iPhone OS 16_6 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Mobile/15E148 Safari/605.1.15',
        'Mozilla/5.0 (iPhone; CPU iPhone OS 17_1_2 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Mobile/15E148 SP-engine/2.85.0 main/1.0 baiduboxapp/13.47.0.10 (Baidu; P2 17.1.2) NABar/1.0 themeUA=Theme/default',
        'Mozilla/5.0 (iPhone; CPU iPhone OS 10_0_1 like Mac OS X) AppleWebKit/602.1.32 (KHTML, like Gecko) Mobile/14A403 Twitter for iPhone',
        'Mozilla/5.0 (iPhone; CPU iPhone OS 10_1_1 like Mac OS X) AppleWebKit/602.2.14 (KHTML, like Gecko) Mobile/14B100 KAKAOTALK 5.9.2',
        'Mozilla/5.0 (iPhone; CPU iPhone OS 10_1_1 like Mac OS X) AppleWebKit/602.2.14 (KHTML, like Gecko) Mobile/14B100 MicroMessenger/6.3.30 NetType/WIFI Language/en',
        'Mozilla/5.0 (iPhone; CPU iPhone OS 10_3_3 like Mac OS X) AppleWebKit/603.3.8 (KHTML, like Gecko) Mobile/14G60 [FBAN/FBIOS;FBAV/167.0.0.50.95;FBBV/102293131;FBDV/iPhone5,4;FBMD/iPhone;FBSN/iOS;FBSV/10.3.3;FBSS/2;FBCR/NOS;FBID/phone;FBLC/en_GB;FBOP/5;FBRV/104064853]',
        'Mozilla/5.0 (iPhone; CPU iPhone OS 12_4 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Mobile/15E148 WebViewApp Foo/1 iPhone11,8',
        'Mozilla/5.0 (iPhone; CPU iPhone OS 14_4_2 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Mobile/15E148',
    ];

    $service = new WebviewDetectService();

    foreach ($userAgents as $userAgent) {
        $result = $service->forUserAgent($userAgent)->isWebView();
        expect($result)->toBeTrue();
    }
});

it('can correctly identify android webview requests', function () {
    $userAgents = [
        'Mozilla/5.0 (Linux; Android 4.4.4; Coolpad 8675-A Build/KTU84P) AppleWebKit/537.36 (KHTML, like Gecko) Version/4.0 Chrome/33.0.0.0 Mobile Safari/537.36 SogouMSESDK hot_sdk_1.5.0',
        'Mozilla/5.0 (Linux; Android 5.1; T72HMs_3G Build/LMY47I; wv) AppleWebKit/537.36 (KHTML, like Gecko) Version/4.0 Chrome/49.0.2623.105 Safari/537.36 YandexSearch/7.40/apad YandexSearchBrowser/7.40',
        'Mozilla/5.0 (Linux; Android 9; AMN-LX9 Build/HUAWEIAMN-LX9; wv) AppleWebKit/537.36 (KHTML, like Gecko) Version/4.0 Chrome/79.0.3945.93 Mobile Safari/537.36 [FB_IAB/FB4A;FBAV/248.1.0.44.116;]',
        'Mozilla/5.0 (Linux; Android 9; Pixel Build/PQ3A.190801.002; wv) AppleWebKit/537.36 (KHTML, like Gecko) Version/4.0 Chrome/77.0.3865.73 Mobile Safari/537.36 WebViewApp Foo/1'
    ];

    $service = new WebviewDetectService();

    foreach ($userAgents as $userAgent) {
        $result = $service->forUserAgent($userAgent)->isWebView();
        expect($result)->toBeTrue();
    }
});
