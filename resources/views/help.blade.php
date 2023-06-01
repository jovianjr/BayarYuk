@extends('layouts.master')

@section('content')
<div>
    <div class='bg-grad-pink h-screen font-bolxtd w-full te-1xl px-2 flex flex-col items-center justify-center text-sm px-6 relative overflow-hidden'>
        <div class="absolute -top-[30%] w-[530px] h-[530px] bg-c-pink rounded-full"></div>
        <h1 class="text-white text-2xl self-start z-10 font-bold">Halo Fiorenza,</h1>
        <h1 class="text-white text-2xl self-start z-10 font-bold">perlu bantuan?</h1>

        <form class='flex flex-row gap-3 items-center justify-center w-full my-4 z-10'>
            <input type="text" id="inputQuery" placeholder="Masukkan kata kunci pencarian" class="w-full p-3 rounded-xl placeholder:text-gray-400 text-c-earlier-black border border-c-blue-white text-sm pl-12">
            <img src="/images/icon/search.svg" alt="searchicon" class="absolute left-[32px]">
        </form>

        <div class='grid grid-col gap-3 z-10 overflow-y-scroll'>
            <div class='border border-white bg-white shadow-c-25 w-full h-auto rounded-xl py-3 px-2'>
                <p class="text-c-earlier-black text-sm font-semibold">Lorem ipsum dolor sit amet?</p>
                <p class="text-c-earlier-black text-sm">Consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad mini veniam, quis nostrud </p>
            </div>
            <div class='border border-white bg-white shadow-c-25 w-full h-auto rounded-xl py-3 px-2'>
                <p class="text-c-earlier-black text-sm font-semibold">Lorem ipsum dolor sit amet?</p>
                <p class="text-c-earlier-black text-sm">Consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad mini veniam, quis nostrud </p>
            </div>
            <div class='border border-white bg-white shadow-c-25 w-full h-auto rounded-xl py-3 px-2'>
                <p class="text-c-earlier-black text-sm font-semibold">Lorem ipsum dolor sit amet?</p>
                <p class="text-c-earlier-black text-sm">Consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad mini veniam, quis nostrud </p>
            </div>
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
            <a href="bayar/qr" type="button" class="inline-flex flex-col items-center justify-center px-5 hover:bg-yellow-400">
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
    @endsection