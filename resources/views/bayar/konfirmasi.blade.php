@extends('layouts.master')

@section('content')
@include('includes.header', ['pageTitle'=>'Konfirmasi Bayar', 'back'=>'/bayar'])
<div>
    <form action="{{ url('/bayar/pin') }} " method="post" class='bg-grad-pink h-screen font-bolxtd w-full te-3xl px-6 flex flex-col items-center justify-center text-sm'>
        @csrf
        <div class="bg-white px-6 py-4 rounded-xl flex items-center justify-between w-72 mb-8 border border-c-blue-white shadow-c-25">
            <img src="{{ $customer->photo ?? 'https://picsum.photos/200' }}" alt="photo" class="rounded-full h-16 w-16">
            <div class="flex flex-col font-semibold gap-2 w-2/3">
                <p class="text-xs">Bayar ke:</p>
                <p class="text-sm">{{ $customer->name }}</p>
            </div>
        </div>
        <input type="hidden" name="payment_code" value="{{ $payment->payment_code ?? old('payment_code') }}" />
        <medium class="w-full help-block text-danger text-center py-2 text-red-500">{{ $errors->has('payment_code') ? $errors->first('payment_code') : '' }}</medium>

        <p class="text-green-800 text-4xl font-semibold mb-16">Rp {{ number_format($payment->amount, 0, '', '.')}}</p>
        <button type="submit" class="bg-c-pink font-semibold text-white px-6 py-2 rounded-xl w-[288px]">
            KONFIRMASI
        </button>
    </form>
</div>
@endsection