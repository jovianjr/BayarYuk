@extends('layouts.master')

@section('content')
<div>
    <div class='bg-white h-screen p-6 font-bolxtd w-full te-3xl flex flex-col items-center text-sm gap-3'>
        <p class='text-2xl font-bold text-left w-full p-2'>Riwayat Transaksi</p>

        <form class='flex flex-row gap-3 items-center justify-center w-full p-2'>
            <input type="text" id="inputQuery" placeholder="Masukkan kata kunci pencarian" class="w-full p-3 rounded-xl placeholder:text-gray-400 text-c-earlier-black border border-c-blue-white text-sm pl-8">
            <img src="/images/icon/search.svg" alt="searchicon" class="absolute left-[40px]">
            <button class="open-modal bg-blue-300 rounded-xl flex items-center justify-center p-2 text-c-earlier-black bg-c-blue-white">
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

        <!-- Modal -->
        <div id="filterModal" class="absolute z-50 top-0 left-0 bg-black/[0.8] h-screen w-screen  text-c-earlier-black flex items-center justify-center hidden">
            <form class="mx-auto py-4 px-6 flex flex-col bg-white rounded-xl border-2 border-c-blue-white w-3/4">
                <h1 class="text-2xl font-semibold">Filter berdasarkan</h1>
                <p class="font-semibold text-lg mt-6">Kategori</p>
                <label class="text-lg py-1">
                    <input type="radio" name="kategori" value="transfer">
                    Transfer
                </label>
                <label class="text-lg py-1">
                    <input type="radio" name="kategori" value="bayar">
                    Bayar
                </label>
                <label class="text-lg py-1">
                    <input type="radio" name="kategori" value="uangmasuk">
                    Uang Masuk
                </label>

                <p class="font-semibold text-lg mt-6">Waktu</p>
                <label class="text-lg py-1">
                    <input type="radio" name="waktu" value="today">
                    Hari ini
                </label>
                <label class="text-lg py-1">
                    <input type="radio" name="waktu" value="thisweek">
                    Minggu ini
                </label>
                <label class="text-lg py-1">
                    <input type="radio" name="waktu" value="twoweek">
                    2 Minggu Lalu
                </label>

                <button class="rounded-xl text-white bg-c-pink w-1/4 text-xl font-bold text-center px-3 py-2 mx-auto mt-6">OK</button>
            </form>
        </div>
    </div>
    <script src="https://code.iconify.design/3/3.1.0/iconify.min.js"></script>
    <script>
        $(document).ready(function() {
            var modal = $("#filterModal");
            var closeButton = $(".close");

            function openModal() {
                modal.removeClass("hidden");
            }

            function closeModal() {
                modal.addClass("hidden");
            }

            $(".open-modal").click(function(event) {
                event.preventDefault();
                openModal();
            });

            closeButton.click(function() {
                closeModal();
            });

            $(window).click(function(event) {
                if (event.target === modal[0]) {
                    closeModal();
                }
            });
        });
    </script>
    @endsection