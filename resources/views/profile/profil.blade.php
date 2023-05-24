@extends('layouts.master')

@section('content')
<div>
<div class='bg-grad-pink h-screen font-bolxtd w-full te-1xl px-2 flex flex-col items-center justify-center text-sm'>
    <div class="flex flex-col items-center">
        <div class="relative rounded-full h-24 w-24">
            <img src="https://picsum.photos/200" alt="photo" class="rounded-full h-24 w-24">
            <a href="" class="absolute bottom-0 right-0 transform translate-x-2/4 translate-y-2/4 -translate-x-1/2 -translate-y-1/2">
            <img src="/images/icon/edit.png" alt="edit icon" class="h-6 w-6">
            </a>
        </div>
    <h2 class="text-3xl text-pink font-semibold text-center mt-4">Fiorenza Celestyn</h2>
    </div>

    <div class="bg-white px-6 py-4 rounded-xl flex items-center justify-between border border-c-pink-white shadow-c-25 mt-6" style="width: 450px;">
        <div class="flex flex-col font-semibold w-full">
            <div class="flex flex-row items-center">
            <div class="flex flex-col">
                <p class="text-xs ml-1">Nomor Telepon</p>
                <div class="flex items-center mt-2">
                <img src="/images/icon/phone.png" alt="phone icon" class="h-4 w-4 text-pink">
                <p class="text-sm ml-2">0842321939</p>
                </div>
            </div>
            </div>

            <div class="flex flex-row items-center">
            <div class="flex flex-col mt-4">
                <p class="text-xs ml-1">Nama Lengkap</p>
                <div class="flex items-center mt-2">
                <img src="/images/icon/name.png" alt="name icon" class="h-4 w-4 text-pink">
                <p class="text-sm ml-2">Fiorenza Celestyn</p>
                </div>
            </div>
            </div>

            <div class="flex flex-row items-center">
            <div class="flex flex-col mt-4">
                <p class="text-xs ml-1">Email</p>
                <div class="flex items-center mt-2">
                <img src="/images/icon/email.png" alt="email icon" class="h-4 w-4 text-pink">
                <p class="text-sm ml-2">FiorenzaCelestyn@gmail.com</p>
                </div>
            </div>
            </div>
        </div>
        </div>

    <button class="bg-c-pink w-1/2 font-semibold text-white px-6 py-2 rounded-xl mt-12"> <a href = ""  class="text-lg"> LOG OUT </a> </button>

    <div class="flex flex-col items-center">
    <p class="text-sm mt-4">Temukan kami di</p>
        <div class="flex items-center mt-4">
            <a href="https://www.instagram.com">
            <div class="rounded-full bg-gray-300 h-10 w-10 flex items-center justify-center">
                <img src="/images/icon/instagram.png" alt="Instagram" class="h-6 w-6">
            </div>
            </a>
            <a href="https://www.twitter.com">
            <div class="rounded-full bg-gray-300 h-10 w-10 flex items-center justify-center ml-2">
                <img src="/images/icon/twitter.png" alt="Twitter" class="h-6 w-6">
            </div>
            </a>
            <a href="https://www.linkedin.com">
            <div class="rounded-full bg-gray-300 h-10 w-10 flex items-center justify-center ml-2">
                <img src="/images/icon/linkedin.png" alt="LinkedIn" class="h-6 w-6">
            </div>
            </a>
            <a href="https://www.youtube.com">
            <div class="rounded-full bg-gray-300 h-10 w-10 flex items-center justify-center ml-2">
                <img src="/images/icon/youtube.png" alt="YouTube" class="h-6 w-6">
            </div>
            </a>
        </div>
    </div>
         
</div>
@endsection