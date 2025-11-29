<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    /**
     * Registro de usuario
     */
    public function register(Request $request)
    {
        // Validación
        $request->validate([
            'name'     => 'required|string|max:255',
            'email'    => 'required|email|unique:users,email',
            'password' => 'required|min:6'
        ]);

        // Crear usuario
        $user = User::create([
            'name'     => $request->name,
            'email'    => $request->email,
            'password' => Hash::make($request->password),
        ]);

        return response()->json([
            'status'  => true,
            'message' => 'Registro exitoso',
            'user'    => $user
        ], 201);
    }

    /**
     * Inicio de sesión
     */
    public function login(Request $request)
    {
        // Validar formato
        $credentials = $request->validate([
            'email'    => 'required|email',
            'password' => 'required'
        ]);

        // Intentar autenticación
        if (!Auth::attempt($credentials)) {
            return response()->json([
                'status'  => false,
                'message' => 'Error en la autenticación'
            ], 401);
        }

        return response()->json([
            'status'  => true,
            'message' => 'Autenticación satisfactoria'
        ], 200);
    }
}
