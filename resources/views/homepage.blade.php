@extends('layouts.master')

@section('content')
<div class='bg-grad-pink-2 h-screen w-full flex flex-col items-center text-sm max-h-screen overflow-scroll'>
    <div class='flex-1 flex w-full py-6 px-6 items-center justify-center'>
        <div class="bg-[url('/images/bg.png')] w-full h-[150px] rounded-xl p-5">
            <p class='text-2xl text-white font-semibold'>Halo {{ $customer->name }}</p>
            <div class='text-right my-3'>
                <p class='text-md text-white'>Saldo Anda</p>
                <p class='text-2xl text-white font-semibold'>Rp {{ $customer->balance }}</p>
            </div>
        </div>
    </div>
    <div class=' w-full bg-white rounded-t-xl pt-6 px-6 pb-28'>
        <div class='flex flex-row items-center justify-start py-5'>
            <a href="transfer/qr" type="button" class="flex-1 inline-flex flex-row items-center justify-center pr-10 gap-3">
                <div class='bg-blue-300 rounded-full p-2'>
                    <span class="iconify" data-icon="fluent:money-hand-24-regular" data-width="28" data-height="28"></span>
                </div>
                <p class='text-sm font-semibold'>Transfer</p>
            </a>
            <a href="bayar/qr" type="button" class="flex-1 inline-flex flex-row items-center justify-center pr-10 gap-3">
                <div class='bg-blue-300 rounded-full p-2'>
                    <span class="iconify" data-icon="fluent:money-hand-24-regular" data-width="28" data-height="28"></span>
                </div>
                <p class='text-sm font-semibold'>Bayar</p>
            </a>
        </div>
        <div class='flex flex-col gap-4'>
            <p class="text-xs">Transaksi terakhir</p>
            @if (count($transactions) == 0)
            <p class='text-center text-gray-400 py-4'>Belum ada transaksi</p>
            @else
            @foreach($transactions as $transaction)
            <div class='border-2 border-blue-white w-full h-auto rounded-xl py-2 px-4 flex items-center'>
                <div class='flex-1 flex items-center gap-2'>
                    @if ($transaction->status === 'IN')
                    <div class='text-green-500 rounded-full aspect-square h-12 pt-2.5'><span class="iconify mx-auto" data-icon="streamline:money-cash-bag-dollar-bag-payment-cash-money-finance" data-width="24" data-height="24"></span></div>
                    @else
                    <div class='text-red-500 rounded-full aspect-square h-12 pt-2.5'><span class="iconify mx-auto" data-icon="solar:hand-money-outline" data-width="24" data-height="24"></div>
                    @endif
                    <div>
                        <div class="flex items-center">
                            <p class='text-md font-semibold'>{{ ucfirst($transaction->type) }}</p>
                            @if ($transaction->status === 'IN')
                            <div class='text-white text-[10px] bg-green-500 rounded-lg flex items-center justify-center px-2 font-semibold ml-2 h-fit leading-none py-0.5'>IN</div>
                            @else
                            <div class='text-white text-[10px] bg-red-500 rounded-lg flex items-center justify-center px-2 font-semibold ml-2 h-fit leading-none py-0.5'>OUT</div>
                            @endif
                        </div>
                        <p class='text-sm text-gray-400'>{{ $transaction->date }}</p>
                        <p class='text-sm text-gray-400'>{{ $transaction->time }}</p>
                    </div>
                </div>
                <div class='flex-1 flex justify-end text-md font-semibold'>Rp {{$transaction->amount}}</div>
            </div>
            @endforeach
            <div class='w-full flex items-center justify-center '>
                <a href="{{ url('/riwayat') }}" class='text-center text-gray-400 py-2 px-3'>Lihat Semua</a>
            </div>
            @endif
        </div>
    </div>

    <div class="fixed z-10 w-full h-16 max-w-lg -translate-x-1/2 bg-white bottom-0 left-1/2 rounded-t-3xl drop-shadow-xl border border-gray-300">
        <div class="grid h-full max-w-lg grid-cols-5 mx-auto text-c-earlier-black">
            <a href="/" type="button" class="inline-flex flex-col items-center justify-center px-5 hover:bg-yellow-400 rounded-tl-3xl">
                <span class="iconify" data-icon="material-symbols:home-outline" data-width="24" data-height="24"></span>
                <p class="font-medium text-xs">Home</p>
            </a>
            <a href="/riwayat" type="button" class="inline-flex flex-col items-center justify-center px-5 hover:bg-yellow-400">
                <span class="iconify" data-icon="gg:list" data-width="24" data-height="24"></span>
                <p class="font-medium text-xs">Riwayat</p>
            </a>
            <a href="bayar/qr" type="button" class="inline-flex flex-col items-center justify-center px-5">
                <div class="absolute -top-[35%] rounded-full bg-c-pink p-1">
                    <img src="/images/icon/bayar-pesawat.svg" alt="bayar" class="translate-x-0.5">
                </div>
                <p class="font-medium text-xs text-c-pink mt-6">Bayar</p>
            </a>
            <a href="help" type="button" class="inline-flex flex-col items-center justify-center px-5 hover:bg-yellow-400">
                <span class="iconify" data-icon="material-symbols:help-outline" data-width="24" data-height="24"></span>
                <p class="font-medium text-xs">Bantuan</p>
            </a>
            <a href="profile" type="button" class="inline-flex flex-col items-center justify-center px-5 hover:bg-yellow-400 rounded-tr-3xl">
                <span class="iconify" data-icon="gg:profile" data-width="24" data-height="24"></span>
                <p class="font-medium text-xs">Profile</p>
            </a>
        </div>
    </div>
</div>
@endsection