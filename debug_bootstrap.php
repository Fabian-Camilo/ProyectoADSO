<?php
// debug_bootstrap.php - intenta cargar Laravel bootstrap para forzar la traza
ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');
error_reporting(E_ALL);

require __DIR__ . '/vendor/autoload.php';

// Intentar cargar bootstrap/app.php
$app = require_once __DIR__ . '/bootstrap/app.php';

echo "Bootstrap cargado correctamente\n";

// Intentar crear kernel (HTTP) si existe
if (class_exists(\Illuminate\Foundation\Console\Kernel::class)) {
    echo "Kernel disponible\n";
} else {
    echo "Kernel NO disponible\n";
}
