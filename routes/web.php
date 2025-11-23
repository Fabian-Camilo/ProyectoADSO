<?php

use Illuminate\Support\Facades\Route;
use App\Http\Livewire\Plans;
use App\Http\Livewire\Companies;
use App\Http\Livewire\Certificates\Index;
use App\Http\Livewire\Certificates\View;
use App\Http\Livewire\QRCode;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::middleware(['auth:sanctum', 'verified'])->get('/', function () {
    return view('dashboard');
})->name('dashboard');

Route::middleware(['auth:sanctum', 'verified'])->get('/companies', Companies::class)->name('companies');

Route::middleware(['auth:sanctum', 'verified'])->get('/subscriptions',  function () {
    return view('dashboard');
})->name('subscriptions');

Route::middleware(['auth:sanctum', 'verified'])->get('/plans', Plans::class)->name('plans');

Route::middleware(['auth:sanctum', 'verified'])->get('/certificates', Index::class)->name('certificates');

Route::get('/certificate', View::class)->name('viewCertificate');

Route::get('/test', function () {
    $texto = "Generando códigos QR con PHP desde parzibyte.me";
    $codigoQR = new QRCode();
    return QrCode::size(300)->backgroundColor(255, 90, 0)->generate('RemoteStack');
});

Route::get('/qrcode', QRCode::class);
