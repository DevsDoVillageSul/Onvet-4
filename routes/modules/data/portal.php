<?php

use App\Http\Controllers\Data\Portal\FaqController;
use App\Http\Controllers\Data\Portal\EnqueteController;
use App\Http\Controllers\Data\Portal\PublicacaoController;
use App\Http\Controllers\Data\Portal\ProgramaController;
use App\Http\Controllers\Data\Portal\QrCodeController;
use App\Http\Controllers\Data\Portal\DepoimentoController;
use App\Http\Controllers\Data\Portal\PromocaoController;

Route::group(['prefix' => 'portal'], function () {
    Route::group(['prefix' => 'faqs'], function () {
        Route::post('save', [FaqController::class, 'save']);
    });

    Route::group(['prefix' => 'enquete'], function () {
        Route::post('save', [EnqueteController::class, 'save']);
    });
    
    Route::group(['prefix' => 'publicacao'], function () {
        Route::post('save', [PublicacaoController::class, 'save']);
    });

    Route::group(['prefix' => 'programa'], function () {
        Route::post('save', [ProgramaController::class, 'save']);
    });

    Route::group(['prefix' => 'qrcode'], function () {
        Route::post('save', [QrCodeController::class, 'save']);
    });

    Route::group(['prefix' => 'depoimento'], function () {
        Route::post('save', [DepoimentoController::class, 'save']);
    });

    Route::group(['prefix' => 'promocao'], function () {
        Route::post('save', [PromocaoController::class, 'save']);
    });
});
