@extends('layouts.master')

@section('content')
<div class='bg-grad-pink h-full font-bold w-full text-1xl px-2 flex flex-col items-center justify-center text-sm'>
    <h1 class="text-3xl text-yellow-400 font-bold text-center mb-4">Selamat Datang!</h1>
    <h2 class="text-4xl text-yellow-400 font-bold text-center mb-4">BayarYuk</h2>
    <img src="/images/welcome/Ilustrasi-goldy.png" alt="" class="mt-6 aspect-auto w-3/4">

    <a href="{{ url('/login')}}" class="bg-c-pink w-1/2 font-semibold text-white px-6 py-2 rounded-xl mt-12 text-lg text-center">
        Masuk
    </a>
    <a href="{{ url('/register')}}" class="font-semibold text-c-earlier-black px-6 mt-12 text-sm text-center">
        Belum punya akun? <span class="underline">Daftar</span>
    </a>
</div>
@endsection