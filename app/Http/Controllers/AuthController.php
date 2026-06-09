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
}