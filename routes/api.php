<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\Auth\LoginController;
use App\Http\Controllers\Api\AllController;
use App\Http\Controllers\Api\ApuracaoController;
use App\Http\Controllers\Api\AssinanteController;
use App\Http\Controllers\Api\PremioController;
use App\Http\Controllers\Api\DepoimentoController;
use App\Http\Controllers\Api\DuvidaController;
use App\Http\Controllers\Api\EmpresaController;
use App\Http\Controllers\Api\RelatorioController;
use App\Http\Controllers\Api\PromocaoController;
use App\Http\Controllers\Api\TermoController;
use App\Http\Controllers\Api\EmailController;
use App\Http\Controllers\Api\MPController;
use App\Http\Controllers\Api\PublicacaoController;
use App\Http\Controllers\Api\VendaController;
use App\Http\Controllers\Api\PagamentoController;
use App\Http\Controllers\Api\EnqueteController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::post('authenticate', [LoginController::class, 'authenticate'])->name('apiLogin');
Route::post('cadastro', [AssinanteController::class, 'cadastro'])->name('apiCadastro');
Route::post('cadastro/sms', [AssinanteController::class, 'sms'])->name('apiCadastroSms');
Route::post('cadastro/usuario', [AssinanteController::class, 'show'])->name('apiCadastroShow');
Route::post('cadastro/editar-perfil', [AssinanteController::class, 'editar'])->name('apiCadastroEditar');
Route::get('premios', [PremioController::class, 'index'])->name('apiPremio');
Route::get('publicacoes', [PublicacaoController::class, 'index'])->name('apiPublicacao');
Route::get('all', [AllController::class, 'index'])->name('apiAll');
Route::get('depoimentos', [DepoimentoController::class, 'index'])->name('apiDepoimento');
Route::get('duvidas', [DuvidaController::class, 'index'])->name('apiDuvida');
Route::get('promocao', [PromocaoController::class, 'index'])->name('apiPromocao');
Route::get('termos', [TermoController::class, 'index'])->name('apiTermos');
Route::get('ganhadores', [ApuracaoController::class, 'index'])->name('apiGanhadores');
Route::any('enquetes', [EnqueteController::class, 'index'])->name('apiEnquetes');
Route::post('enquetes/votar', [EnqueteController::class, 'votar'])->name('apiEnquetesVotar');
Route::post('fale-conosco', [EmailController::class, 'faleConosco'])->name('apiFaleConosco');
Route::post('fale-conosco/cancelar', [EmailController::class, 'cancelar'])->name('apiCancelar');
Route::post('venda/prepara', [MPController::class, 'prepara'])->name('apiVendaPrepara');
Route::post('venda/preparaPix', [MPController::class, 'preparaPix'])->name('apiVendaPreparaPix');
Route::post('pagamentos', [PagamentoController::class, 'my'])->name('apiPagamentos');
Route::post('pagamentos/cupom', [PagamentoController::class, 'cupom'])->name('apiPagamentosCupom');

Route::group(['prefix' => 'mp'], function () {
    Route::any('success', [MPController::class, 'success']);
    Route::any('failure', [MPController::class, 'failure']);
    Route::any('pending', [MPController::class, 'pending']);
});

Route::group(['prefix' => 'parceiro'], function () {
    Route::post('login', [EmpresaController::class, 'login'])->name('apiParceiroLogin');
    Route::middleware(['auth:api'])->group(function () {
        Route::post('venda/save', [VendaController::class, 'venda'])->name('apiParceiroEfetuarVenda');
        Route::post('venda/print', [VendaController::class, 'print'])->name('apiParceiroImpressaoEfetuada');
        Route::post('comissoes', [RelatorioController::class, 'comissoes'])->name('apiParceiroComissao');
        Route::post('vendas', [RelatorioController::class, 'vendas'])->name('apiParceiroVendas');
        Route::post('vendasQrCode', [RelatorioController::class, 'vendasQrCode'])->name('apiParceirovendasQrCode');
        Route::post('logout', [EmpresaController::class, 'logout'])->name('apiParceiroLogin');
    });
});
