<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;

Route::get('/', function () {
    return view('frontend.index');
});

Route::get('/loginOnvet', function () {
    return redirect('dashboard');
})->name('home');
Route::get('login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('login', [LoginController::class, 'authenticate']);
Route::get('logout', [LoginController::class, 'logout'])->name('logout');
//Route::any('primeiro-acesso/{id}', [LoginController::class, 'primeiroAcesso'])->name('primeiroAcesso');
//Route::post('redefinir-senha', [LoginController::class, 'redefinirSenha'])->name('redefinirSenha');


Route::middleware(['auth'])->group(function () {
    Route::get('dashboard', function () {
        return redirect('security/role');
    });
    Route::get('exemplo', function () {
        return redirect('security/role');
    });

    include('modules/general/security.php');
    include('modules/cadastro/index.php');
    include('modules/tema.php');

    //nossas  
    // include('modules/general/security.php');
    // include('modules/cadastro/index.php');      
    // include('modules/tema.php');
    // include('modules/data/endpoints.php');
    // include('modules/duvida/index.php');
    // include('modules/rebanho/index.php');
    // include('modules/protocolo/index.php');

    include('modules/data/endpoints.php');
});
