<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CategoriaController;
use App\Http\Controllers\ObjetivoController;
use App\Http\Controllers\SolicitudController;
use App\Http\Controllers\ContactoController;

// Rutas de autenticacion
Route::prefix('auth')->group(function () {
    Route::post('/registro', [AuthController::class, 'register']);
    Route::post('/login', [AuthController::class, 'login']);
    Route::post('/salir', [AuthController::class, 'logout'])->middleware('auth:sanctum');
    Route::get('/usuario', [AuthController::class, 'user'])->middleware('auth:sanctum');
});

// Categorias (publico: listar y ver)
Route::get('categorias',       [CategoriaController::class, 'index']);
Route::get('categorias/{id}',  [CategoriaController::class, 'show']);

Route::middleware('auth:sanctum')->group(function () {
    Route::post('categorias',          [CategoriaController::class, 'store']);
    Route::put('categorias/{id}',      [CategoriaController::class, 'update']);
    Route::delete('categorias/{id}',   [CategoriaController::class, 'destroy']);
});

// Objetivos (publico: listar y ver)
Route::get('objetivos',       [ObjetivoController::class, 'index']);
Route::get('objetivos/{id}',  [ObjetivoController::class, 'show']);

Route::middleware('auth:sanctum')->group(function () {
    Route::post('objetivos',         [ObjetivoController::class, 'store']);
    Route::put('objetivos/{id}',     [ObjetivoController::class, 'update']);
    Route::delete('objetivos/{id}',  [ObjetivoController::class, 'destroy']);
});

// Solicitudes
Route::post('/solicitudes', [SolicitudController::class, 'store']); // publico

Route::middleware('auth:sanctum')->group(function () {
    Route::get('/solicitudes', [SolicitudController::class, 'index']);
    Route::get('/solicitudes/{solicitud}', [SolicitudController::class, 'show']);
    Route::post('/solicitudes/{solicitud}/estado', [SolicitudController::class, 'cambiarEstado']);
});

// Contacto (publico: enviar mensaje)
Route::post('/contacto', [ContactoController::class, 'store']);

Route::middleware('auth:sanctum')->group(function () {
    Route::get('/contacto', [ContactoController::class, 'index']);
});