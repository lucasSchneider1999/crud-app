<?php

//use Illuminate\Support\Facades\Route;
use App\Http\Controllers\VagasController;

Route::get('/vagas', [VagasController::class, 'index']);
Route::get('/vagas/create', [VagasController::class, 'create']);
Route::post('/vagas', [VagasController::class, 'store'])->name('vagas.store');
Route::get('/vagas/{id}/edit', [VagasController::class, 'edit'])->name('vagas.edit');
Route::put('/vagas/{id}', [VagasController::class, 'update'])->name('vagas.update');