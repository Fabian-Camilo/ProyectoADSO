<?php
// tools/check_imagick.php - diagnóstico rápido para imagick en Windows/Laragon
echo "Check Imagick diagnostic\n";
echo str_repeat('=', 40) . "\n";

echo "PHP binary: " . PHP_BINARY . "\n";
echo "PHP version: " . PHP_VERSION . "\n";

$ini = php_ini_loaded_file();
if ($ini) {
    echo "Loaded php.ini: $ini\n";
} else {
    echo "No php.ini loaded (CLI default)\n";
}

echo "extension_dir: " . ini_get('extension_dir') . "\n";

$ext = 'imagick';
echo "extension_loaded('imagick'): ";
var_export(extension_loaded($ext));
echo "\n";

// check for php_imagick.dll in extension_dir
$extDir = realpath(ini_get('extension_dir')) ?: ini_get('extension_dir');
$phpImagickPath = $extDir ? rtrim($extDir, '\\\\/') . DIRECTORY_SEPARATOR . 'php_imagick.dll' : null;
if ($phpImagickPath && file_exists($phpImagickPath)) {
    echo "Found php_imagick.dll at: $phpImagickPath\n";
} else {
    echo "php_imagick.dll NOT found in extension_dir (checked: $phpImagickPath)\n";
}

// try to run `magick` or `convert` to see if ImageMagick is in PATH
echo "Checking ImageMagick presence via 'magick' or 'convert'...\n";
$whichMagick = null;
if (strtoupper(substr(PHP_OS, 0, 3)) === 'WIN') {
    // use where
    @exec('where magick 2>&1', $out1, $r1);
    @exec('where convert 2>&1', $out2, $r2);
    if (!empty($out1)) {
        $whichMagick = implode("\n", $out1);
    } elseif (!empty($out2)) {
        $whichMagick = implode("\n", $out2);
    }
    if ($whichMagick) {
        echo "ImageMagick binaries found:\n$whichMagick\n";
    } else {
        echo "ImageMagick not found in PATH (where magick/convert returned nothing)\n";
    }
} else {
    @exec('which magick 2>&1', $out1, $r1);
    if (!empty($out1)) {
        echo "ImageMagick found: " . implode("\n", $out1) . "\n";
    } else {
        echo "ImageMagick not found in PATH\n";
    }
}

// Print last PHP error (if any)
$error = error_get_last();
if ($error) {
    echo "Last PHP error: \n";
    print_r($error);
}

echo str_repeat('=', 40) . "\n";

// Help: suggest exact commands to run in cmd
echo "Run this in cmd (replace path to php if different):\n";
echo "C:\\laragon\\bin\\php\\php-8.3.6-nts-Win32-vs16-x64\\php.exe tools\\check_imagick.php\n";

echo "If imagick is not loaded, ensure you added 'extension=imagick' to the php.ini shown above and that php_imagick.dll exists in the extension_dir. Also ensure ImageMagick's bin is in PATH and that the VC++ redistributable (VC16) is installed.\n";
