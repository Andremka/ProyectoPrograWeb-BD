<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function register(Request $request)
    {
        $request->validate([
            'nombre'   => 'required|string|max:100',
            'paterno'  => 'required|string|max:100',
            'materno'  => 'nullable|string|max:100',
            'email'    => 'required|email|unique:usuarios,email',
            'password' => 'required|min:6',
        ]);

        $user = User::create([
            'nombre'   => $request->nombre,
            'paterno'  => $request->paterno,
            'materno'  => $request->materno,
            'email'    => $request->email,
            'password' => Hash::make($request->password),
            'rol'      => 0,
        ]);

        $token = $user->createToken('auth_token')->plainTextToken;

        return response()->json([
            'user'  => $user,
            'token' => $token,
        ], 201);
    }

    public function login(Request $request)
    {
        $request->validate([
            'email'    => 'required|email',
            'password' => 'required',
        ]);

        if (!Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
            return response()->json(['message' => 'Credenciales incorrectas'], 401);
        }

        $user  = Auth::user();
        $token = $user->createToken('auth_token')->plainTextToken;

        return response()->json([
            'user'  => $user,
            'token' => $token,
            'rol'   => $user->rol,
        ]);
    }

    public function logout(Request $request)
    {
        $request->user()->currentAccessToken()->delete();
        return response()->json(['message' => 'Sesión cerrada correctamente...']);
    }

    public function user(Request $request)
    {
        return response()->json($request->user());
    }

    public function actualizarCredenciales(Request $request)
    {
        $user = $request->user();

        if (!$user->esAdmin()) {
            return response()->json(['message' => 'No autorizado'], 403);
        }

        $request->validate([
            'email'        => 'sometimes|email|unique:usuarios,email,' . $user->id_usuario . ',id_usuario',
            'password'     => 'sometimes|min:6',
            'nombre'       => 'sometimes|string|max:100',
            'paterno'      => 'sometimes|string|max:100',
        ]);

        if ($request->has('password')) {
            $request->merge(['password' => Hash::make($request->password)]);
        }

        $user->update($request->only('email', 'password', 'nombre', 'paterno'));

        return response()->json([
            'message' => 'Credenciales actualizadas correctamente',
            'user'    => $user
        ]);
    }
}