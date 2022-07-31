<?php

use App\Http\Controllers\Data\Cadastro\AoVivoController;
use App\Http\Controllers\Data\Cadastro\EmpresaController;
use App\Http\Controllers\Data\Cadastro\PremioController;

Route::group(['prefix' => 'cadastros'], function () {
    Route::group(['prefix' => 'empresas'], function () {
        Route::post('save', [EmpresaController::class, 'save']);
        Route::get('qrcode', [EmpresaController::class, 'makeQrCode']);
        Route::get('resetasenha', [EmpresaController::class, 'resetaSenha']);
    });

    Route::group(['prefix' => 'premios'], function () {
        Route::post('save', [PremioController::class, 'save']);
    });

    Route::group(['prefix' => 'ao-vivo'], function () {
        Route::post('save', [AoVivoController::class, 'save']);
    });
});

