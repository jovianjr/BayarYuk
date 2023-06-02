@extends('layouts.master')

@section('content')
<div class="w-full h-full flex flex-col gap-4 items-center justify-center px-[5vw] py-[12.5vh]">
    <div class="relative flex justify-center items-center w-full h-full bg-[url('/images/bg-qr.png')] bg-cover border border-c-pink rounded-xl">
        <span class="absolute top-4 left-4 text-white font-semibold">Alphonsus Jovian</span>
        <span class="absolute top-10 left-4 text-white">081325267902</span>
        <div class="p-2 bg-white">
            {!! $qrCode !!}
        </div>
    </div>
    <small>Minta temanmu untuk scan QR code ini</small>
</div>
@endsection