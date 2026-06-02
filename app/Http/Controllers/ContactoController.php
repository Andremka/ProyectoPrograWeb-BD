<?php

namespace App\Http\Controllers;

use App\Models\Contacto;
use Illuminate\Http\Request;

class ContactoController extends Controller
{
    public function index()
    {
        return response()->json(Contacto::all());
    }

    public function store(Request $request)
    {
        $request->validate([
            'nombre'  => 'required|string|max:200',
            'email'   => 'required|email|max:100',
            'mensaje' => 'required|string',
        ]);

        $contacto = Contacto::create($request->only('nombre', 'email', 'mensaje'));
        return response()->json($contacto, 201);
    }
}