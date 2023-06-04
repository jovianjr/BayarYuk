@extends('layouts.master')

@section('content')
<div>
    <div class='bg-grad-pink h-screen font-bolxtd w-full te-1xl px-2 flex flex-col items-center justify-center text-sm px-6 relative overflow-hidden'>
        <div class="absolute -top-[30%] w-[530px] h-[530px] bg-c-pink rounded-full"></div>
        <div class="flex flex-col items-center z-10">
            <div class="relative rounded-full h-24 w-24">
                <img src="https://picsum.photos/200" alt="photo" class="rounded-full h-24 w-24">
                <!-- <a href="" class="absolute -bottom-1 right-2 bg-white text-c-pink rounded p-1">
                    <img src="/images/icon/edit.svg" alt="edit icon" class="h-3 w-3">
                </a> -->
            </div>
            <h2 class="text-3xl text-white font-semibold text-center mt-4">{{ $customer->name }}</h2>
        </div>

        <div class="bg-white px-6 py-4 rounded-xl flex items-center justify-between border border-c-pink-white shadow-c-25 mt-6 w-full z-10">
            <div class="flex flex-col font-semibold w-full">
                <div class="flex flex-row items-center">
                    <div class="flex flex-col text-c-earlier-black">
                        <p class="text-xs font-semibold">Nomor Telepon</p>
                        <div class="flex items-center mt-2">
                            <img src="/images/icon/phone.png" alt="phone icon" class="h-4 w-4 text-pink">
                            <p class="text-sm font-normal ml-2">{{ $customer->phone_number }}</p>
                        </div>
                    </div>
                </div>

                <div class="flex flex-row items-center">
                    <div class="flex flex-col text-c-earlier-black mt-4">
                        <p class="text-xs font-semibold">Nama Lengkap</p>
                        <div class="flex items-center mt-2">
                            <img src="/images/icon/name.png" alt="name icon" class="h-4 w-4 text-pink">
                            <p class="text-sm font-normal ml-2">{{ $customer->name }}</p>
                        </div>
                    </div>
                </div>

                <div class="flex flex-row items-center">
                    <div class="flex flex-col text-c-earlier-black mt-4">
                        <p class="text-xs font-semibold">Email</p>
                        <div class="flex items-center mt-2">
                            <img src="/images/icon/email.png" alt="email icon" class="h-4 w-4 text-pink">
                            <p class="text-sm font-normal ml-2">{{ $customer->email }}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="flex flex-col w-full items-center gap-2 mt-12">
            <a href="/logout" class="bg-c-pink w-1/2 font-semibold text-white px-6 py-2 rounded-xl text-lg text-center">LOG OUT</a>
        </div>

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

        @include('includes.floatybar')
    </div>
    @endsection