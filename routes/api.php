<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ObjetivoController;
use App\Http\Controllers\SolicitudController;
use App\Http\Controllers\ContactoController;

// Rutas de autenticacion
Route::prefix('auth')->group(function () {
    Route::post('/registro', [AuthController::class, 'register']);
    Route::post('/login',    [AuthController::class, 'login']);
    Route::post('/salir',    [AuthController::class, 'logout'])->middleware('auth:sanctum');
    Route::get('/usuario',   [AuthController::class, 'user'])->middleware('auth:sanctum');
});

// Objetivos (publico: listar y ver)
Route::apiResource('objetivos', ObjetivoController::class)->only(['index', 'show']);

Route::middleware('auth:sanctum')->group(function () {
    Route::apiResource('objetivos', ObjetivoController::class)->except(['index', 'show']);
});

// Solicitudes
Route::post('/solicitudes', [SolicitudController::class, 'store']); // publico

Route::middleware('auth:sanctum')->group(function () {
    Route::get('/solicitudes',                     [SolicitudController::class, 'index']);
    Route::get('/solicitudes/{solicitud}',         [SolicitudController::class, 'show']);
    Route::post('/solicitudes/{solicitud}/estado', [SolicitudController::class, 'cambiarEstado']);
});

// Contacto (publico: enviar mensaje)
Route::post('/contacto', [ContactoController::class, 'store']);

Route::middleware('auth:sanctum')->group(function () {
    Route::get('/contacto', [ContactoController::class, 'index']);
});