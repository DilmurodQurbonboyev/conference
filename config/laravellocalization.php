<?php

return [
    'supportedLocales' => [
        'uz' => ['name' => 'Уз', 'script' => 'Cyrl', 'native' => 'ЎЗБ', 'regional' => 'uz_UZ'],
        'oz' => ['name' => 'O‘z', 'script' => 'Latn', 'native' => 'O‘ZB', 'regional' => 'uz_UZ'],
        'ru' => ['name' => 'Ру', 'script' => 'Cyrl', 'native' => 'РУС', 'regional' => 'ru_RU'],
        'en' => ['name' => 'En', 'script' => 'Latn', 'native' => 'ENG', 'regional' => 'en_GB'],
    ],
    'useAcceptLanguageHeader' => true,
    'hideDefaultLocaleInURL' => false,
    'localesOrder' => [],
    'localesMapping' => [],
    'utf8suffix' => env('LARAVELLOCALIZATION_UTF8SUFFIX', '.UTF-8'),
    'urlsIgnored' => ['/skipped'],
];
