@extends('layouts.master')

@section('content')
@include('includes.header', ['pageTitle'=>'Riwayat Pembayaran', 'back'=>'/'])
<div class='bg-grad-pink-2 h-full w-full flex flex-col items-center text-sm max-h-screen overflow-auto px-8 pt-28 pb-4'>
    <div class='bg-white w-full h-auto flex flex-col px-4 py-6 rounded-lg justify-between'>
        <div class='flex flex-col gap-4'>
            <p class='text-base font-bold'>Riwayat Pembayaran</p>
            @foreach ($payments as $payment)
            <div class='flex w-full pt-2 pb-4 border-b-2 justify-between border-c-pink' onclick="window.location.href = '{{ url('/pembayaran/detail/').'/'.$payment->payment_code }}'">
                <div class="flex flex-col gap-2">
                    <div class="flex flex-col">
                        <span class="text-md font-semibold"> {{ $payment->payment_code }} </span>
                        <span class="text-base text-slate-700"> Rp {{ number_format($payment->amount, 0, '', '.')}} </span>
                    </div>
                </div>
                <div class="flex flex-col gap-1 items-end justify-center">
                    <p class="text-md font-semibold {{ $payment->status == 'SUCCESS' ? 'text-green-500' : 'text-red-500'}}"> {{ $payment->status }} </p>
                    <div class="flex gap-2 text-xs text-slate-500">
                        <p> {{ $payment->date }} </p>
                        <p> {{ $payment->time }} </p>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
        <a href="{{ url('/pembayaran/tambah')}}" class='mt-4 py-2 bg-c-pink text-white text-center rounded-sm font-semibold'>Tambah</a>
    </div>
</div>
@endsection