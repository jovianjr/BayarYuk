@extends('layouts.master')

@section('content')
<div>
<div class='bg-grad-pink h-screen font-bolxtd w-full te-1xl px-2 flex flex-col items-center justify-center text-sm'>
        <h1 class="text-3xl text-yellow-400 font-bold text-center mb-4">Selamat Datang!</h1>
        <h2 class="text-4xl text-yellow-400 font-bold text-center mb-4">BayarYuk</h2>
        <img src="/images/welcome/ilustrasi-goldy.png" alt="" class="mt-6">

        <button class="bg-c-pink w-1/2 font-semibold text-white px-6 py-2 rounded-xl mt-12">
                   <a href = "/login/form"  class="text-lg"> Masuk </a>
                </button>
    </div>
</div>
@endsection