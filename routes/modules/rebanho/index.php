<?php

use App\Http\Controllers\Rebanho\LoteController;
use App\Http\Controllers\Rebanho\AnimalController;

Route::group(['prefix' => 'rebanho'], function () {
    Route::group(['prefix' => 'lotes'], function () {
        Route::any('/', [LoteController::class, 'index'])
            ->name('lotes-index')
            ->middleware('checkPermission:17')
        ;
        Route::get('/delete/{id}', [LoteController::class, 'destroy'])
            ->name('lotes-destroy')
            ->middleware('checkPermission:17')
        ;
        Route::get('/create/{id}', [LoteController::class, 'create'])
            ->name('lotes-create')
            ->middleware('checkPermission:17')
        ;
    });

    Route::group(['prefix' => 'animais'], function () {
        Route::any('/', [AnimalController::class, 'index'])
            ->name('animais-index')
            ->middleware('checkPermission:18')
        ;
        Route::get('/delete/{id}', [AnimalController::class, 'destroy'])
            ->name('animais-destroy')
            ->middleware('checkPermission:18')
        ;
        Route::get('/create/{id}', [AnimalController::class, 'create'])
            ->name('animais-create')
            ->middleware('checkPermission:18')
        ;
        Route::get('/show/{id}', [AnimalController::class, 'show'])->middleware('checkPermission:18')
        ->name('animais-show')
        ->middleware('checkPermission:16')
        ; 

    });
});