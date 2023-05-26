@extends('layouts.master')

@section('content')
<div>
    <div class='bg-grad-pink-2 h-screen font-bolxtd w-full te-3xl flex flex-col items-center justify-center text-sm'>
        <div class='w-full p-6'>
            <div class="bg-[url('/images/bg.png')] w-full h-[150px] rounded-xl p-5">
                <p class='text-2xl text-white font-semibold'>Halo Fiorenza</p>
                <div class='text-right my-3'>
                    <p class='text-lg text-white'>Saldo Anda</p>
                    <p class='text-2xl text-white font-semibold'>Rp 100.000.000</p>
                </div>
            </div>
        </div>
        <div class='w-full min-h-[387px] bg-white rounded-t-xl p-7'>
            <div class='flex flex-row items-center justify-start py-5'>
                <button type="button" class="inline-flex flex-row items-center justify-center pr-10 gap-3">
                    <div class='bg-blue-300 rounded-full p-2'>
                        <span class="iconify" data-icon="fluent:money-hand-24-regular" data-width="28" data-height="28"></span>
                    </div>
                    <p class='text-md font-semibold'>Transfer</p>
                </button>
                <button type="button" class="inline-flex flex-row items-center justify-center pr-10 gap-3">
                    <div class='bg-blue-300 rounded-full p-2'>
                        <span class="iconify" data-icon="fluent:money-hand-24-regular" data-width="28" data-height="28"></span>
                    </div>
                    <p class='text-md font-semibold'>Bayar</p>
                </button>
            </div>
            <div class='grid grid-col gap-3'>
                <p>Transaksi terakhir</p>
                <div class='border-2 border-blue-white w-full h-auto rounded-xl py-2'>
                    <div class='grid grid-cols-[55px_155px_105px] flex items-center justify-center'>
                        <div class='bg-blue-300 rounded-full p-4 w-4 mx-auto'></div>
                        <div>
                            <p class='text-md font-semibold'>Transfer</p>
                            <p class='text-sm text-gray-400'>09 Agustus 2023</p>
                        </div>
                        <div class='text-md font-semibold'>Rp 100.000</div>
                    </div>
                </div>
                <div class='border-2 border-blue-white w-full h-auto rounded-xl py-2'>
                    <div class='grid grid-cols-[55px_155px_105px] flex items-center justify-center'>
                        <div class='bg-blue-300 rounded-full p-4 w-4 mx-auto'></div>
                        <div>
                            <p class='text-md font-semibold'>Transfer</p>
                            <p class='text-sm text-gray-400'>09 Agustus 2023</p>
                        </div>
                        <div class='text-md font-semibold'>Rp 100.000</div>
                    </div>
                </div>
                <div class='border-2 border-blue-white w-full h-auto rounded-xl py-2'>
                    <div class='grid grid-cols-[55px_155px_105px] flex items-center justify-center'>
                        <div class='bg-blue-300 rounded-full p-4 w-4 mx-auto'></div>
                        <div>
                            <p class='text-md font-semibold'>Transfer</p>
                            <p class='text-sm text-gray-400'>09 Agustus 2023</p>
                        </div>
                        <div class='text-md font-semibold'>Rp 100.000</div>
                    </div>
                </div>
                <div class='border-2 border-blue-white w-full h-auto rounded-xl py-2'>
                    <div class='grid grid-cols-[55px_155px_105px] flex items-center justify-center'>
                        <div class='bg-blue-300 rounded-full p-4 w-4 mx-auto'></div>
                        <div>
                            <p class='text-md font-semibold'>Transfer</p>
                            <p class='text-sm text-gray-400'>09 Agustus 2023</p>
                        </div>
                        <div class='text-md font-semibold'>Rp 100.000</div>
                    </div>
                </div>
            </div>
        </div>

        <div class="fixed z-10 w-full h-16 max-w-lg -translate-x-1/2 bg-white bottom-0 left-1/2 rounded-t-3xl drop-shadow-xl border border-gray-300">
            <div class="grid h-full max-w-lg grid-cols-5 mx-auto text-c-earlier-black">
                <button type="button" class="inline-flex flex-col items-center justify-center px-5 hover:bg-yellow-400 rounded-tl-3xl">
                    <span class="iconify" data-icon="material-symbols:home-outline" data-width="24" data-height="24"></span>
                    <p class="font-medium text-xs">Home</p>
                </button>
                <button type="button" class="inline-flex flex-col items-center justify-center px-5 hover:bg-yellow-400">
                    <span class="iconify" data-icon="gg:list" data-width="24" data-height="24"></span>
                    <p class="font-medium text-xs">Riwayat</p>
                </button>
                <button type="button" class="inline-flex flex-col items-center justify-center px-5 hover:bg-yellow-400">
                    <div class="absolute -top-[35%] rounded-full bg-c-pink p-1">
                        <img src="/images/icon/bayar-pesawat.svg" alt="bayar" class="translate-x-0.5">
                    </div>
                    <p class="font-medium text-xs text-c-pink mt-6">Bayar</p>
                </button>
                <button type="button" class="inline-flex flex-col items-center justify-center px-5 hover:bg-yellow-400">
                    <span class="iconify" data-icon="material-symbols:help-outline" data-width="24" data-height="24"></span>
                    <p class="font-medium text-xs">Bantuan</p>
                </button>
                <button type="button" class="inline-flex flex-col items-center justify-center px-5 hover:bg-yellow-400 rounded-tr-3xl">
                    <span class="iconify" data-icon="gg:profile" data-width="24" data-height="24"></span>
                    <p class="font-medium text-xs">Profile</p>
                </button>
            </div>
        </div>
    </div>
</div>
<script src="https://code.iconify.design/3/3.1.0/iconify.min.js"></script>
@endsection