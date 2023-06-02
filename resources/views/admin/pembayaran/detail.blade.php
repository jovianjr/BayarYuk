@extends('layouts.master')

@section('content')
@include('includes.header', ['pageTitle'=>'Detail Pembayaran', 'back'=>'/pembayaran'])
<div class="w-full h-full flex flex-col gap-4 items-center justify-center px-[5vw] py-[12.5vh]">
    <div class="relative flex justify-center items-center w-full h-full bg-[url('/images/bg-qr.png')] bg-cover border border-c-pink rounded-xl">
        <div class="p-2 bg-white">
            {!! $qrCode !!}
        </div>
    </div>
    <medium>Kode Pembayaran: <b>{{ $payment->payment_code }}</b></medium>
</div>
@endsection