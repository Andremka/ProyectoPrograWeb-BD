<?php

namespace App\Http\Controllers;

use App\Models\Solicitud;
use App\Models\EstadoSolicitud;
use Illuminate\Http\Request;

class SolicitudController extends Controller
{
    public function index()
    {
        $solicitudes = Solicitud::with(['usuario', 'objetivo', 'estados'])->get();
        return response()->json($solicitudes);
    }

    public function show($id)
    {
        $solicitud = Solicitud::with(['usuario', 'objetivo', 'estados'])->findOrFail($id);
        return response()->json($solicitud);
    }

    public function store(Request $request)
    {
        $request->validate([
            'id_usuario' => 'required|exists:usuarios,id_usuario',
            'id_objetivo' => 'required|exists:objetivos,id_objetivo',
            'session_id' => 'nullable|string|max:255',
            'mensaje' => 'nullable|string',
        ]);

        $solicitud = Solicitud::create($request->only(
            'id_usuario', 'id_objetivo', 'session_id', 'mensaje'
        ));

        EstadoSolicitud::create([
            'id_solicitud' => $solicitud->id_solicitud,
            'estado'       => 'pendiente',
        ]);

        return response()->json($solicitud->load(['usuario', 'objetivo', 'estados']), 201);
    }

    public function cambiarEstado(Request $request, $id)
    {
        $solicitud = Solicitud::findOrFail($id);

        $request->validate([
            'estado' => 'required|in:pendiente,activa,cerrada',
            'observacion' => 'nullable|string',
        ]);

        EstadoSolicitud::create([
            'id_solicitud' => $solicitud->id_solicitud,
            'estado' => $request->estado,
            'observacion'  => $request->observacion,
        ]);

        return response()->json($solicitud->load('estados'));
    }

    public function porUsuario($id_usuario)
    {
        $solicitudes = Solicitud::with(['objetivo', 'estados'])
            ->where('id_usuario', $id_usuario)
            ->get();

        return response()->json($solicitudes);
    }

    public function mensajesPorUsuario($id_usuario)
    {
        $mensajes = Solicitud::where('id_usuario', $id_usuario)
            ->select('id_solicitud', 'mensaje', 'created_at')
            ->get();

        return response()->json($mensajes);
    }
}