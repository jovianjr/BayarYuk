@extends('layouts.master')

@section('content')
@include('includes.header', ['pageTitle'=>'Riwayat', 'back'=>'/'])
<div>
    <div class='bg-white h-screen p-6 w-full te-3xl flex flex-col items-center text-sm gap-3'>
        <p class='text-2xl font-bold text-left w-full p-2 mt-12'>Riwayat Transaksi</p>

        <form class='flex flex-row gap-3 items-center justify-center w-full p-2'>
            <input type="text" id="inputQuery" placeholder="Masukkan kata kunci pencarian" class="w-full p-3 rounded-xl placeholder:text-gray-400 text-c-earlier-black border border-c-blue-white text-sm pl-8">
            <img src="/images/icon/search.svg" alt="searchicon" class="absolute left-[40px]">
            <button class="open-modal bg-blue-300 rounded-xl flex items-center justify-center p-2 text-c-earlier-black bg-c-blue-white">
                <span class="iconify" data-icon="mi:filter" data-width="24" data-height="24"></span>
            </button>
        </form>

        <div class='grid grid-col gap-3 w-full'>
            @if (count($transactions) == 0)
            <p class='text-center text-gray-400 py-4'>Tidak ada transaksi</p>
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
            @endif
        </div>
        @include('includes.floatybar')

        <!-- Modal -->
        <div id="filterModal" class="absolute z-50 top-0 left-0 bg-black/[0.8] h-screen w-screen  text-c-earlier-black flex items-center justify-center hidden">
            <form method="POST" action="{{ route('riwayat.filter') }}" class="mx-auto py-4 px-6 flex flex-col bg-white rounded-xl border-2 border-c-blue-white w-3/4">
                @csrf
                <h1 class="text-2xl font-semibold">Filter berdasarkan</h1>
                <p class="font-semibold text-lg mt-6">Kategori</p>
                <label class="text-lg py-1">
                    <input type="radio" name="kategori" value="Semua">
                    Semua
                </label>
                <label class="text-lg py-1">
                    <input type="radio" name="kategori" value="IN">
                    Uang Masuk
                </label>
                <label class="text-lg py-1">
                    <input type="radio" name="kategori" value="OUT">
                    Uang Keluar
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
                <button type="submit" class="rounded-xl text-white bg-c-pink w-1/4 text-xl font-bold text-center px-3 py-2 mx-auto mt-6">OK</button>
            </form>
        </div>
    </div>
    <script src="https://code.iconify.design/3/3.1.0/iconify.min.js"></script>
    <script>
        $(document).ready(function() {
            var modal = $("#filterModal");

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

            $(window).click(function(event) {
                if (event.target === modal[0]) {
                    closeModal();
                }
            });
        });
    </script>
    @endsection