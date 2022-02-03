<?php

use Illuminate\Support\Facades\Route;

Route::group(
    [
        'prefix' => Mcamara\LaravelLocalization\Facades\LaravelLocalization::setLocale(),
        'middleware' => ['localeSessionRedirect', 'localizationRedirect', 'localeViewPath']
    ],
    function () {

        Illuminate\Support\Facades\Auth::routes([
            'register' => false,
            'reset' => false,
            'verify' => false,
        ]);

        Route::controller(App\Http\Controllers\Auth\OneIdController::class)
            ->group(function () {
                Route::get('/oneId', 'oneId')->name('oneId');
                Route::get('/check', 'check')->name('check');
            });

        Route::group([
            'prefix' => 'admin',
            'middleware' => ['web', 'auth', 'role:super-admin|admin']
        ], function () {

            Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('admin');
            Route::post('/', [App\Http\Controllers\HomeController::class, 'darkMode'])->name('darkMode');

            Route::group(['middleware' => 'checkPermission'], function () {

                Route::resources([
                    'menus-category' => App\Http\Controllers\MenuCategoryController::class,
                    'menus' => App\Http\Controllers\MenuController::class,
                    'news-category' => App\Http\Controllers\NewsCategoryController::class,
                    'news' => App\Http\Controllers\NewsController::class,
                    'pages-category' => App\Http\Controllers\PageCategoryController::class,
                    'pages' => App\Http\Controllers\PageController::class,
                    'useful-category' => App\Http\Controllers\UsefulCategoryController::class,
                    'useful' => App\Http\Controllers\UsefulController::class,
                    'photos-category' => App\Http\Controllers\PhotoCategoryController::class,
                    'photos' => App\Http\Controllers\PhotoController::class,
                    'videos-category' => App\Http\Controllers\VideoCategoryController::class,
                    'videos' => App\Http\Controllers\VideoController::class,
                    'messages' => App\Http\Controllers\MessageController::class,
                    'managements' => App\Http\Controllers\ManagementController::class,
                    'managements-category' => App\Http\Controllers\ManagementCategoryController::class,
                ]);

                Route::resource('logs', App\Http\Controllers\LogController::class)->except('edit', 'create');
                Route::resource('appeals', App\Http\Controllers\AppealController::class);

                Route::group(['middleware' => ['role:super-admin']], function () {

                    Route::resources([
                        'users' => App\Http\Controllers\UserController::class,
                        'roles' => App\Http\Controllers\RoleController::class,
                        'permissions' => App\Http\Controllers\PermissionController::class,
                    ]);
                });
            });

            Route::fallback(function () {
                return view("admin.errors.404");
            });
        });
    }
);

Route::group(['prefix' => 'laravel-filemanager', 'middleware' => ['web', 'auth']], function () {
    \UniSharp\LaravelFilemanager\Lfm::routes();
});
