<?php

use App\Http\Controllers\ConsultaController;
use App\Http\Controllers\DashController;
use App\Http\Controllers\SimulacaoController;
use Illuminate\Support\Facades\Route;



Auth::routes();

//Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


// Simulacoes
Route::resource('simulacao', SimulacaoController::class);
Route::get('/resultado', [SimulacaoController::class, 'resultado'])->name('resultado');

// Consulta
Route::resource('consulta', ConsultaController::class);

// Admin - Inicial
Route::get('/admin', [DashController::class, 'index'])->name('admin');

// Dash
Route::get('/dash', [DashController::class, 'dashboard'])->name('dash');