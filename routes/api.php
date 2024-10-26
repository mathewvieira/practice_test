<?php

use App\Http\Controllers\CaminhaoController;
use App\Http\Controllers\ModeloController;
use App\Http\Controllers\MotoristaController;
use App\Http\Controllers\TransportadoraController;
use Illuminate\Support\Facades\Route;

// Manual routes for CaminhaoController
Route::get('caminhoes', [CaminhaoController::class, 'index'])->name('caminhoes.index');
Route::post('caminhoes', [CaminhaoController::class, 'store'])->name('caminhoes.store');
Route::get('caminhoes/{caminhao}', [CaminhaoController::class, 'show'])->name('caminhoes.show');
Route::put('caminhoes/{caminhao}', [CaminhaoController::class, 'update'])->name('caminhoes.update');
Route::patch('caminhoes/{caminhao}', [CaminhaoController::class, 'update'])->name('caminhoes.update');
Route::delete('caminhoes/{caminhao}', [CaminhaoController::class, 'destroy'])->name('caminhoes.destroy');
Route::delete('caminhoes/removerTodos', [CaminhaoController::class, 'destroyAll']);

// Manual routes for TransportadoraController
Route::get('transportadoras', [TransportadoraController::class, 'index'])->name('transportadoras.index');
Route::post('transportadoras', [TransportadoraController::class, 'store'])->name('transportadoras.store');
Route::get('transportadoras/{transportadora}', [TransportadoraController::class, 'show'])->name('transportadoras.show');
Route::put('transportadoras/{transportadora}', [TransportadoraController::class, 'update'])->name('transportadoras.update');
Route::patch('transportadoras/{transportadora}', [TransportadoraController::class, 'update'])->name('transportadoras.update');
Route::delete('transportadoras/{transportadora}', [TransportadoraController::class, 'destroy'])->name('transportadoras.destroy');
Route::delete('transportadoras/removerTodos', [TransportadoraController::class, 'destroyAll']);

// Manual routes for MotoristaController
Route::get('motoristas', [MotoristaController::class, 'index'])->name('motoristas.index');
Route::post('motoristas', [MotoristaController::class, 'store'])->name('motoristas.store');
Route::get('motoristas/{motorista}', [MotoristaController::class, 'show'])->name('motoristas.show');
Route::put('motoristas/{motorista}', [MotoristaController::class, 'update'])->name('motoristas.update');
Route::patch('motoristas/{motorista}', [MotoristaController::class, 'update'])->name('motoristas.update');
Route::delete('motoristas/{motorista}', [MotoristaController::class, 'destroy'])->name('motoristas.destroy');
Route::delete('motoristas/removerTodos', [MotoristaController::class, 'destroyAll']);

// Manual routes for ModeloController
Route::get('modelos', [ModeloController::class, 'index'])->name('modelos.index');
Route::post('modelos', [ModeloController::class, 'store'])->name('modelos.store');
Route::get('modelos/{modelo}', [ModeloController::class, 'show'])->name('modelos.show');
Route::put('modelos/{modelo}', [ModeloController::class, 'update'])->name('modelos.update');
Route::patch('modelos/{modelo}', [ModeloController::class, 'update'])->name('modelos.update');
Route::delete('modelos/{modelo}', [ModeloController::class, 'destroy'])->name('modelos.destroy');
Route::delete('modelos/removerTodos', [ModeloController::class, 'destroyAll']);
