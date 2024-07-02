<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/



use App\Http\Controllers\CondominioController;
use App\Http\Controllers\UsuarioController;
use App\Http\Controllers\AutorizacaoController;
use App\Http\Controllers\PersistentLoginController;
use App\Http\Controllers\BlocoController;
use App\Http\Controllers\MoradiaController;
use App\Http\Controllers\PeriodoController;
use App\Http\Controllers\CategoriaController;
use App\Http\Controllers\SubcategoriaController;
use App\Http\Controllers\OrcamentoController;
use App\Http\Controllers\CobrancaController;
use App\Http\Controllers\ContaController;
use App\Http\Controllers\ContaBancariaController;
use App\Http\Controllers\LancamentoController;

// Route::middleware('auth:api')->group(function () {  Desativado Temporariamente para ver Funcionamento
    // Rotas para Condominio
    Route::apiResource('condominios', CondominioController::class);

    // Rotas para Usuario
    Route::apiResource('usuarios', UsuarioController::class);

    // Rotas para Autorizacao
    Route::apiResource('autorizacoes', AutorizacaoController::class);

    // Rotas para PersistentLogin
    Route::apiResource('persistent_logins', PersistentLoginController::class);

    // Rotas para Bloco
    Route::apiResource('blocos', BlocoController::class);

    // Rotas para Moradia
    Route::apiResource('moradias', MoradiaController::class);

    // Rotas para Periodo
    Route::apiResource('periodos', PeriodoController::class);

    // Rotas para Categoria
    Route::apiResource('categorias', CategoriaController::class);

    // Rotas para Subcategoria
    Route::apiResource('subcategorias', SubcategoriaController::class);

    // Rotas para Orcamento
    Route::apiResource('orcamentos', OrcamentoController::class);

    // Rotas para Cobranca
    Route::apiResource('cobrancas', CobrancaController::class);

    // Rotas para Conta
    Route::apiResource('contas', ContaController::class);

    // Rotas para ContaBancaria
    Route::apiResource('conta_bancarias', ContaBancariaController::class);

    // Rotas para Lancamento
    Route::apiResource('lancamentos', LancamentoController::class);
// });


Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
