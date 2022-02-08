<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Artisan;

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
        Route::get('/register', [App\Http\Controllers\SiteController::class, 'register'])->name('register');
        Route::post('/register', [App\Http\Controllers\SiteController::class, 'registerPost'])->name('registerPost');
        Route::get('/leaders', [App\Http\Controllers\SiteController::class, 'leaders']);

        Route::fallback(function () {
            return view("frontend.error");
        });


        Route::get('clear', function () {
            Artisan::call('optimize:clear');
            Artisan::call('storage:link');
            return redirect('/');
        });
    }
);
