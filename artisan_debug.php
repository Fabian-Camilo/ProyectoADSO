<?php
// artisan_debug.php - Ejecuta el kernel de consola con captura amplia de errores
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

set_error_handler(function($severity, $message, $file, $line) {
    throw new ErrorException($message, 0, $severity, $file, $line);
});

register_shutdown_function(function() {
    $err = error_get_last();
    if ($err && ($err['type'] & (E_ERROR | E_PARSE | E_CORE_ERROR | E_COMPILE_ERROR))) {
        echo "Shutdown error: ";
        print_r($err);
    }
});

require __DIR__.'/vendor/autoload.php';

try {
    $app = require_once __DIR__.'/bootstrap/app.php';
    $kernel = $app->make(Illuminate\Contracts\Console\Kernel::class);
    $status = $kernel->handle(
        $input = new Symfony\Component\Console\Input\ArgvInput,
        new Symfony\Component\Console\Output\ConsoleOutput
    );
    $kernel->terminate($input, $status);
    exit($status);
} catch (Throwable $e) {
    echo "Caught throwable: " . get_class($e) . ": " . $e->getMessage() . PHP_EOL . $e->getTraceAsString();
    // write to file
    @file_put_contents(__DIR__.'/artisan_debug_error.txt', $e->getMessage() . PHP_EOL . $e->getTraceAsString());
    exit(1);
}
