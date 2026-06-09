<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Certificate;

class CertificadoController extends Controller
{
    public function validar(Request $request)
    {
        $request->validate([
            'codigo' => 'required|string'
        ]);

        // Simulación de búsqueda de certificado
        if ($request->codigo === 'CERT123') {
            return response()->json([
                'success' => true,
                'usuario' => [
                    'nombre' => 'Juan Pérez',
                    'email' => 'juan.perez@example.com',
                ],
                'certificado' => [
                    'codigo' => 'CERT123',
                    'fecha_emision' => '2026-04-20',
                ]
            ]);
        } else {
            return response()->json([
                'success' => false,
                'message' => 'Certificado no encontrado'
            ], 404);
        }
    }
}
