<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CategoriaController;
use App\Http\Controllers\ObjetivoController;
use App\Http\Controllers\SolicitudController;
use App\Http\Controllers\ReporteController;

// Rutas de autenticacion
Route::prefix('auth')->group(function () {
    Route::post('/registro', [AuthController::class, 'register']);
    Route::post('/login', [AuthController::class, 'login']);
    Route::post('/salir', [AuthController::class, 'logout'])->middleware('auth:sanctum');
    Route::get('/usuario', [AuthController::class, 'user'])->middleware('auth:sanctum');
    Route::put('/actualizar-credenciales', [AuthController::class, 'actualizarCredenciales'])->middleware('auth:sanctum');
});

// Categorias 
Route::get('categorias',       [CategoriaController::class, 'index']);
Route::get('categorias/{id}',  [CategoriaController::class, 'show']);

Route::middleware('auth:sanctum')->group(function () {
    Route::post('categorias', [CategoriaController::class, 'store']);
    Route::put('categorias/{id}', [CategoriaController::class, 'update']);
    Route::delete('categorias/{id}', [CategoriaController::class, 'destroy']);
});

// Objetivos 
Route::get('objetivos', [ObjetivoController::class, 'index']);
Route::get('objetivos/{id}', [ObjetivoController::class, 'show']);

Route::middleware('auth:sanctum')->group(function () {
    Route::post('objetivos', [ObjetivoController::class, 'store']);
    Route::put('objetivos/{id}', [ObjetivoController::class, 'update']);
    Route::delete('objetivos/{id}', [ObjetivoController::class, 'destroy']);
});

// Solicitudes
Route::post('/solicitudes', [SolicitudController::class, 'store']);

Route::middleware('auth:sanctum')->group(function () {
    Route::get('/solicitudes', [SolicitudController::class, 'index']);
    Route::get('/solicitudes/{solicitud}', [SolicitudController::class, 'show']);
    Route::post('/solicitudes/{solicitud}/estado', [SolicitudController::class, 'cambiarEstado']);
    Route::get('/solicitudes/usuario/{id_usuario}', [SolicitudController::class, 'porUsuario']);
    Route::get('/solicitudes/usuario/{id_usuario}/mensajes', [SolicitudController::class, 'mensajesPorUsuario']);
});

// Reportes (solo admin)
Route::middleware('auth:sanctum')->group(function () {
    Route::get('/reportes/solicitudes-por-usuario', [ReporteController::class, 'solicitudesPorUsuario']);
    Route::get('/reportes/solicitudes-por-categoria', [ReporteController::class, 'solicitudesPorCategoria']);
    Route::get('/reportes/estados-por-solicitud', [ReporteController::class, 'estadosPorSolicitud']);
    Route::get('/reportes/usuarios-mas-solicitudes', [ReporteController::class, 'usuariosConMasSolicitudes']);
    Route::get('/reportes/solicitudes-por-mes', [ReporteController::class, 'solicitudesPorMes']);
});