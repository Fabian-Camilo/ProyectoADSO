
<?php

use App\Http\Controllers\Api\AuthController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\CertificadoController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/
// Endpoint GET temporal para pruebas desde navegador
Route::get('/validar-certificado', function (Request $request) {
    $codigo = $request->query('codigo');
    if ($codigo === 'CERT123') {
        return response()->json([
            'success' => true,
            'usuario' => [
                'nombre' => 'Juan Pérez',
                'email' => 'juan.perez@example.com',
            ],
            'certificado' => [
                'codigo' => 'CERT123',
                'curso' => 'Laravel Básico',
                'fecha_emision' => '2026-04-20',
            ]
        ]);
    } else {
        return response()->json([
            'success' => false,
            'message' => 'Certificado no encontrado'
        ], 404);
    }
});
Route::post('/validar-certificado', [CertificadoController::class, 'validar']);

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('/register', [AuthController::class, 'register']);
Route::post('/login',    [AuthController::class, 'login']);
