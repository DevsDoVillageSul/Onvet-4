<?php

use App\Http\Controllers\Dados\DashboardController;

Route::group(['prefix' => 'dados'], function () {
    Route::group(['prefix' => 'dashboard'], function () {
        Route::any('/', [DashboardController::class, 'index'])
            ->name('dashboard-index')
            ->middleware('checkPermission:22')
        ;
    });
});