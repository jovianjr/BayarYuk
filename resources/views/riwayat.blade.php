@extends('layouts.master')

@section('content')
<div>
    <div class='bg-white h-screen p-6 font-bolxtd w-full te-3xl flex flex-col items-center text-sm gap-3'>
        <p class='text-2xl font-bold text-left w-full p-2'>Riwayat Transaksi</p>

        <form class='flex flex-row gap-3 items-center justify-center w-full p-2'>
            <input type="text" id="inputQuery" placeholder="Masukkan kata kunci pencarian" class="w-full p-3 rounded-xl placeholder:text-gray-400 text-c-earlier-black border border-c-blue-white text-sm">

            <button class="bg-blue-300 rounded-xl flex items-center justify-center p-2 text-c-earlier-black bg-c-blue-white">
                <span class="iconify" data-icon="mi:filter" data-width="24" data-height="24"></span>
            </button>
        </form>

        <div class='grid grid-col gap-3'>
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
        <div class="fixed z-10 w-full h-16 max-w-lg -translate-x-1/2 bg-white bottom-0 left-1/2 rounded-t-3xl drop-shadow-xl border border-gray-300">
            <div class="grid h-full max-w-lg grid-cols-5 mx-auto">
                <button type="button" class="inline-flex flex-col items-center justify-center px-5 hover:bg-yellow-400 rounded-tl-3xl">
                    <span class="iconify" data-icon="material-symbols:home-outline" data-width="32" data-height="32"></span>
                    <p>Home</p>
                </button>
                <button type="button" class="inline-flex flex-col items-center justify-center px-5 hover:bg-yellow-400">
                    <span class="iconify" data-icon="gg:list" data-width="32" data-height="32"></span>
                    <p>Riwayat</p>
                </button>
                <button type="button" class="inline-flex flex-col items-center justify-center px-5 hover:bg-yellow-400">
                    <span class="iconify" data-icon="uiw:pay" data-width="32" data-height="32"></span>
                    <p>Bayar</p>
                </button>
                <button type="button" class="inline-flex flex-col items-center justify-center px-5 hover:bg-yellow-400">
                    <span class="iconify" data-icon="material-symbols:help-outline" data-width="32" data-height="32"></span>
                    <p>Bantuan</p>
                </button>
                <button type="button" class="inline-flex flex-col items-center justify-center px-5 hover:bg-yellow-400 rounded-tr-3xl">
                    <span class="iconify" data-icon="gg:profile" data-width="32" data-height="32"></span>
                    <p>Profile</p>
                </button>
            </div>
        </div>
        </.div>
    </div>
    <script src="https://code.iconify.design/3/3.1.0/iconify.min.js"></script>
    @endsection