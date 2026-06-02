<?php

namespace App\Http\Controllers;

use App\Models\Objetivo;
use Illuminate\Http\Request;

class ObjetivoController extends Controller
{
    public function index()
    {
        return response()->json(Objetivo::all());
    }

    public function show($id)
    {
        $objetivo = Objetivo::findOrFail($id);
        return response()->json($objetivo);
    }

    public function store(Request $request)
    {
        $request->validate([
            'descripcion' => 'required|string|max:255',
            'categoria'   => 'required|string|max:100',
        ]);

        $objetivo = Objetivo::create($request->only('descripcion', 'categoria'));
        return response()->json($objetivo, 201);
    }

    public function update(Request $request, $id)
    {
        $objetivo = Objetivo::findOrFail($id);

        $request->validate([
            'descripcion' => 'sometimes|string|max:255',
            'categoria'   => 'sometimes|string|max:100',
        ]);

        $objetivo->update($request->only('descripcion', 'categoria'));
        return response()->json($objetivo);
    }

    public function destroy($id)
    {
        $objetivo = Objetivo::findOrFail($id);
        $objetivo->delete();
        return response()->json(['message' => 'Objetivo eliminado']);
    }
}