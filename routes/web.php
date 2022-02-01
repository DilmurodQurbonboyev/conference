<?php

use Illuminate\Support\Facades\Route;

Route::group(
    [
        'prefix' => Mcamara\LaravelLocalization\Facades\LaravelLocalization::setLocale(),
        'middleware' => ['localeSessionRedirect', 'localizationRedirect', 'localeViewPath']
    ],
    function () {


        Route::get('/', [App\Http\Controllers\SiteController::class, 'index']);
        Route::get('/category/{slug}', [App\Http\Controllers\SiteController::class, 'category'])->name('category');
        Route::get('/news/{slug}', [App\Http\Controllers\SiteController::class, 'news'])->name('news');
        Route::get('/pages/{slug}', [App\Http\Controllers\SiteController::class, 'pages'])->name('pages');

        Route::fallback(function () {
            return view("frontend.error");
        });
    }
);
