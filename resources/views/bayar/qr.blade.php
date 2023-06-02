@extends('layouts.master')

@section('content')
@include('includes.header', ['pageTitle'=>'Transfer ke Pengguna', 'back'=>'/'])
<div>
    <div class='bg-grad-pink h-screen font-bolxtd w-full te-3xl px-6 flex flex-col items-center justify-center text-sm'>
        <form action="{{ url('/bayar/konfirmasi') }}" method="post" class="flex flex-col w-72" id="inputForm">
            @csrf
            <input type="text" id="payment_code" name="payment_code" placeholder="" class="hidden">
            <small class="w-full help-block text-danger text-center py-2 text-red-500">{{ $errors->has('payment_code') ? $errors->first('payment_code') : '' }}</small>
        </form>
        <video class="bg-gray-400 w-[312px] h-[355px] rounded-xl object-cover" id="scanner"></video>
        <p class="font-normal text-c-earlier-black my-3">Arahkan kamera ke kode QR</p>
        <p class="font-semibold text-c-earlier-blac my-3">Atau</p>
        <a href="/bayar/manual" class="bg-c-pink font-semibold text-white px-6 py-2 rounded-xl">
            Masukkan Nomor Secara Manual
        </a>
    </div>

</div>
<script src="https://rawgit.com/schmich/instascan-builds/master/instascan.min.js"></script>
<script>
    let scanner = new Instascan.Scanner({
        video: document.getElementById('scanner')
    });

    scanner.addListener('scan', function(content) {
        $('#payment_code').val(content);
        $('#inputForm').submit();
    });

    Instascan.Camera.getCameras().then(function(cameras) {
        if (cameras.length > 0) {
            scanner.start(cameras[0]); // Start scanning using the first available camera
        } else {
            console.error('No cameras found.');
        }
    }).catch(function(error) {
        console.error(error);
    });
</script>
@endsection