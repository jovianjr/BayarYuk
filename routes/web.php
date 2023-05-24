<?php

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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/coba', function () {
    return view('inputpin');
});

Route::prefix('profile')->group(function () {
    Route::get('/profil', function () {
        return view('profile.profil');
    });
    Route::get('/help', function () {
        return view('login.help');
    });
});

Route::get('/homepage', function () {
    return view('homepage');
});

Route::get('/riwayat', function () {
    return view('riwayat');
});

Route::prefix('transfer')->group(function () {
    Route::get('/qr', function () {
        return view('transfer.qr');
    });
    Route::get('/manual', function () {
        return view('transfer.manual');
    });
    Route::get('/nominal', function () {
        return view('transfer.nominal');
    });
    Route::get('/konfirmasi', function () {
        return view('transfer.konfirmasi');
    });
    Route::get('/pin', function () {
        return view('transfer.inputpin');
    });
    Route::get('/berhasil', function () {
        return view('transfer.berhasil');
    });
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__ . '/auth.php';
Route::prefix('bayar')->group(function () {
    Route::get('/qr', function () {
        return view('bayar.qr');
    });
    Route::get('/manual', function () {
        return view('bayar.manual');
    });
    Route::get('/konfirmasi', function () {
        return view('bayar.konfirmasi');
    });
    Route::get('/pin', function () {
        return view('bayar.inputpin');
    });
    Route::get('/berhasil', function () {
        return view('bayar.berhasil');
    });
});
