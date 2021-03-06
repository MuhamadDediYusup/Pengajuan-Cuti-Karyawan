<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CutiController;
use App\Http\Controllers\PengajuanCutiController;
use App\Http\Controllers\StatusPengajuan;

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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard', [
        'user' => auth()->user(),
    ]);
})->middleware(['auth'])->name('dashboard');

// route untuk menampilkan halaman cuti
Route::resource('pengajuan', PengajuanCutiController::class)->middleware(['auth']);
Route::get('status_pengajuan', [StatusPengajuan::class, 'index'])->middleware(['auth']);

require __DIR__ . '/auth.php';
