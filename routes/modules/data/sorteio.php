<?php

use App\Http\Controllers\Data\Sorteio\LotoFacilController;
use App\Http\Controllers\Data\Sorteio\SorteioController;

Route::group(['prefix' => 'sorteio'], function () {
    Route::group(['prefix' => 'loto-facil'], function () {
        Route::post('save', [LotoFacilController::class, 'save']);
        Route::post('confirmar', [LotoFacilController::class, 'confirmar']);
    });

    Route::group(['prefix' => 'sorteio'], function () {
        Route::any('apurar', [SorteioController::class, 'apurar']);
        Route::post('save', [SorteioController::class, 'save']);
    });
});
