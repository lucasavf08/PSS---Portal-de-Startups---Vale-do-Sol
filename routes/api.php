<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StartupController;

// Esta rota serve APENAS para enviar e receber os dados (JSON)
Route::get('/startups', [StartupController::class, 'index']);
Route::post('/startups', [StartupController::class, 'store']);