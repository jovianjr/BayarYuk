@extends('layouts.master')

@section('content')
<div>
    <div class='bg-grad-pink h-screen font-bolxtd w-full te-3xl px-6 flex flex-col items-center justify-center text-sm'>
        <p class="font-semibold text-sm text-c-earlier-black">Masukkan PIN</p>
        <input id="inputPIN" type="password" class="hidden" maxlength="6">
        <div class="flex items-center gap-4 mt-5 pin-circles">
            <div id="pin1" class="bg-c-pink-white rounded-full h-6 w-6"></div>
            <div id="pin2" class="bg-c-pink-white rounded-full h-6 w-6"></div>
            <div id="pin3" class="bg-c-pink-white rounded-full h-6 w-6"></div>
            <div id="pin4" class="bg-c-pink-white rounded-full h-6 w-6"></div>
            <div id="pin5" class="bg-c-pink-white rounded-full h-6 w-6"></div>
            <div id="pin6" class="bg-c-pink-white rounded-full h-6 w-6"></div>
        </div>
        <div class="grid grid-cols-3 gap-4 my-12 text-2xl font-bold text-c-earlier-black">
            <button onclick="appendToInput('1')" class="rounded-full bg-white py-4 px-6">1</button>
            <button onclick="appendToInput('2')" class="rounded-full bg-white py-4 px-6">2</button>
            <button onclick="appendToInput('3')" class="rounded-full bg-white py-4 px-6">3</button>
            <button onclick="appendToInput('4')" class="rounded-full bg-white py-4 px-6">4</button>
            <button onclick="appendToInput('5')" class="rounded-full bg-white py-4 px-6">5</button>
            <button onclick="appendToInput('6')" class="rounded-full bg-white py-4 px-6">6</button>
            <button onclick="appendToInput('7')" class="rounded-full bg-white py-4 px-6">7</button>
            <button onclick="appendToInput('8')" class="rounded-full bg-white py-4 px-6">8</button>
            <button onclick="appendToInput('9')" class="rounded-full bg-white py-4 px-6">9</button>
            <div></div>
            <button onclick="appendToInput('0')" class="rounded-full bg-white py-4 px-6">0</button>
            <button onclick="clearInput(event)">
                <img src="/images/erase.svg" alt="erase" class="object-contain mx-auto">
            </button>
        </div>
        <button class="rounded-full text-white bg-c-pink w-16 h-16 text-2xl font-bold text-center p-3 pt-4">OK</button>
    </div>
</div>
<script>
    function appendToInput(value) {
        let pinInput = document.getElementById('inputPIN');
        let pin = pinInput.value;
        if (pin.length < 6) {
            pin += value;
            if (pin.length > 6) {
                pin = pin.slice(0, 6);
            }
            pinInput.value = pin;
        }
        console.log(pinInput.value);

        var circles = document.querySelectorAll('.pin-circles > div');
        for (var i = 0; i < circles.length; i++) {
            if (i < pin.length) {
                circles[i].classList.add('bg-yellow-400');
            } else {
                circles[i].classList.remove('bg-yellow-400');
            }
        }
    }

    function clearInput() {
        document.getElementById('inputPIN').value = '';
    }
</script>
@endsection