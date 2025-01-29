<?php

//use Illuminate\Support\Facades\Route;
use App\Http\Controllers\VagasController;

Route::get('/vagas', [VagasController::class, 'index']);

