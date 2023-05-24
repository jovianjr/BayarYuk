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

Route::get('/login', function () {
    return view('login');
});

Route::get('/homepage', function () {
    return view('homepage');
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
    Route::get('/berhasil', function () {
        return view('transfer.berhasil');
    });
});
