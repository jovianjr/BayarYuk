@extends('layouts.master')

@section('content')
<div>
    <div class='bg-grad-pink h-screen font-bolxtd w-full te-3xl px-6 flex flex-col items-center justify-center text-sm'>
        <p class="font-semibold text-sm text-c-earlier-black">Masukkan PIN</p>
        <div class="flex items-center gap-4 mt-5">
            <div class="bg-c-pink-white rounded-full h-6 w-6"></div>
            <div class="bg-c-pink-white rounded-full h-6 w-6"></div>
            <div class="bg-c-pink-white rounded-full h-6 w-6"></div>
            <div class="bg-c-pink-white rounded-full h-6 w-6"></div>
            <div class="bg-c-pink-white rounded-full h-6 w-6"></div>
            <div class="bg-c-pink-white rounded-full h-6 w-6"></div>
        </div>
        <div class="grid grid-cols-3 gap-4 my-12 text-2xl font-bold text-c-earlier-black">
            <button onclick="appendToInput(event, '1')" class="rounded-full bg-white py-4 px-6">1</button>
            <button onclick="appendToInput(event, '2')" class="rounded-full bg-white py-4 px-6">2</button>
            <button onclick="appendToInput(event, '3')" class="rounded-full bg-white py-4 px-6">3</button>
            <button onclick="appendToInput(event, '4')" class="rounded-full bg-white py-4 px-6">4</button>
            <button onclick="appendToInput(event, '5')" class="rounded-full bg-white py-4 px-6">5</button>
            <button onclick="appendToInput(event, '6')" class="rounded-full bg-white py-4 px-6">6</button>
            <button onclick="appendToInput(event, '7')" class="rounded-full bg-white py-4 px-6">7</button>
            <button onclick="appendToInput(event, '8')" class="rounded-full bg-white py-4 px-6">8</button>
            <button onclick="appendToInput(event, '9')" class="rounded-full bg-white py-4 px-6">9</button>
            <div></div>
            <button onclick="appendToInput(event, '0')" class="rounded-full bg-white py-4 px-6">0</button>
            <button onclick="clearInput(event)">
                <img src="/images/erase.svg" alt="erase" class="object-contain mx-auto">
            </button>
        </div>
        <div class="rounded-full text-white bg-c-pink w-16 h-16 text-2xl font-bold text-center p-3 pt-4">OK</div>
    </div>
</div>
<script>
    function appendToInput(value) {
        console.log("ehe")
    }

    function clearInput() {
        console.log("ehe")
    }
</script>
@endsection