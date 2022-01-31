<?php

use Illuminate\Support\Facades\Route;

Route::group(
    [
        'prefix' => Mcamara\LaravelLocalization\Facades\LaravelLocalization::setLocale(),
        'middleware' => ['localeSessionRedirect', 'localizationRedirect', 'localeViewPath']
    ],
    function () {

        Route::controller(App\Http\Controllers\SiteController::class)
            ->group(function () {
                Route::get('/',  'index');
            });
    }
);
