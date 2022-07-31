<?php

use App\Http\Controllers\Data\Rebanho\LoteController;
use App\Http\Controllers\Data\Rebanho\AnimalController;

Route::group(['prefix' => 'rebanho'], function () {
    Route::group(['prefix' => 'lotes'], function () {
        Route::post('save', [LoteController::class, 'save']);
    });
});

Route::group(['prefix' => 'rebanho'], function () {
    Route::group(['prefix' => 'animais'], function () {
        Route::post('save', [AnimalController::class, 'save']);
    });
});