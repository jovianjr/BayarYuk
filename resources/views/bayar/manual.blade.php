@extends('layouts.master')

@section('content')
@include('includes.header', ['pageTitle'=>'Bayar', 'back'=>'/'])
<div>
    <div class='bg-grad-pink h-screen font-bolxtd w-full te-3xl px-6 flex flex-col items-center justify-center text-sm'>
        <a href="/transfer/qr" class="bg-red-500 rounded-xl p-4 mb-8">
            <img src="/images/transfer/icon-qr.svg" alt="icon-qr" class="text-white h-16 w-16 mx-auto mb-2">
            <p class="text-white font-semibold">Kembali Scan</p>
        </a>
        <form action="{{ url('/bayar/konfirmasi') }}" method="post" class="flex flex-col w-72">
            @csrf
            <input type="text" name="type" value="manual" class="hidden">
            <input type="text" name="payment_code" placeholder="Masukkan Kode Pembayaran" class="p-3 rounded-xl placeholder:text-gray-400 text-c-earlier-black border border-c-pink">
            <small class="w-full help-block text-danger text-center py-2 text-red-500">{{ $errors->has('payment_code') ? $errors->first('payment_code') : '' }}</small>
            <button type="submit" class="bg-c-pink font-semibold text-white px-6 py-2 rounded-xl mt-6">
                LANJUTKAN
            </button>

        </form>
    </div>
</div>
@endsection