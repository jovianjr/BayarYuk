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
    @endsection