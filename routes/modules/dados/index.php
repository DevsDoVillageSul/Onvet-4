<?php

use App\Http\Controllers\Dados\DashboardController;

Route::group(['prefix' => 'dados'], function () {
    Route::group(['prefix' => 'dashboard'], function () {
        Route::any('/', [DashboardController::class, 'index'])
            ->name('lotes-index')
            ->middleware('checkPermission:22')
        ;
    });
});