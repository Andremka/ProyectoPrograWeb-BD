<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ReporteController extends Controller
{
    public function solicitudesPorUsuario()
    {
        $resultado = DB::select('CALL reporte_solicitudes_por_usuario()');
        return response()->json($resultado);
    }

    public function solicitudesPorCategoria()
    {
        $resultado = DB::select('CALL reporte_solicitudes_por_categoria()');
        return response()->json($resultado);
    }

    public function estadosPorSolicitud()
    {
        $resultado = DB::select('CALL reporte_estados_por_solicitud()');
        return response()->json($resultado);
    }

    public function usuariosConMasSolicitudes()
    {
        $resultado = DB::select('CALL usuarios_con_mas_solicitudes()');
        return response()->json($resultado);
    }

    public function solicitudesPorMes()
    {
        $resultado = DB::select('CALL reporte_solicitudes_por_mes()');
        return response()->json($resultado);
    }
}
