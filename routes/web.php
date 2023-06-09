<?php

use App\Http\Controllers\HelpController;
use App\Http\Controllers\HistoryController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\QrController;
use App\Http\Controllers\TransferController;

use App\Http\Controllers\Admin\PaymentController as AdminPaymentController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', [HomeController::class, 'index']);

Route::prefix('profile')->middleware(['auth'])->group(function () {
    Route::get('/', [ProfileController::class, 'index']);
    Route::get('/pengaturan', [ProfileController::class, 'pengaturan']);
    Route::post('/pengaturan/store', [ProfileController::class, 'store']);
});

Route::prefix('qr')->middleware(['auth'])->group(function () {
    Route::get('/', [QrController::class, 'index']);
});

Route::get('/help', [HelpController::class, 'index'])->middleware(['auth'])->name('help');

Route::prefix('riwayat')->middleware(['auth'])->group(function () {
    Route::get('/', [HistoryController::class, 'index'])->name('riwayat.index');
    Route::post('/', [HistoryController::class, 'filter'])->name('riwayat.filter');
});

Route::prefix('transfer')->middleware(['auth'])->group(function () {
    Route::get('/', [TransferController::class, 'index']);
    Route::get('/manual', [TransferController::class, 'manual']);
    Route::get('/qr', [TransferController::class, 'qr']);

    Route::get('/nominal', [TransferController::class, 'nominal']);
    Route::post('/nominal', [TransferController::class, 'nominal']);

    Route::post('/konfirmasi', [TransferController::class, 'konfirmasi']);

    Route::get('/pin', [TransferController::class, 'pin']);
    Route::post('/pin', [TransferController::class, 'pin']);

    Route::post('/store', [TransferController::class, 'store']);
    Route::get('/berhasil', [TransferController::class, 'berhasil']);
});

Route::prefix('bayar')->middleware(['auth'])->group(function () {
    Route::get('/', [PaymentController::class, 'index']);
    Route::get('/manual', [PaymentController::class, 'manual']);
    Route::get('/qr', [PaymentController::class, 'qr']);

    Route::get('/konfirmasi', [PaymentController::class, 'konfirmasi']);
    Route::post('/konfirmasi', [PaymentController::class, 'konfirmasi']);

    Route::get('/pin', [PaymentController::class, 'pin']);
    Route::post('/pin', [PaymentController::class, 'pin']);

    Route::post('/store', [PaymentController::class, 'store']);
    Route::get('/berhasil', [PaymentController::class, 'berhasil']);
});

Route::prefix('pembayaran')->middleware(['auth'])->group(function () {
    Route::get('/', [AdminPaymentController::class, 'index']);
    Route::get('/tambah', [AdminPaymentController::class, 'add']);
    Route::post('/store', [AdminPaymentController::class, 'store']);
    Route::get('/detail/{id}', [AdminPaymentController::class, 'detail']);
});

require __DIR__ . '/auth.php';
