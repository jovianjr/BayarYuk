@extends('layouts.master')

@section('content')
<div>
    <form action="{{ url('/transfer/store') }}" method="post" class='bg-grad-pink h-screen font-bolxtd w-full te-3xl px-6 flex flex-col items-center justify-center text-sm'>
        @csrf
        <img src="images/logo_by.png" alt="logo" class="w-16 aspect-square">
        <p class="font-semibold text-sm text-c-earlier-black">Masukkan PIN</p>
        <input name="pin" id="pin" type="password" class="hidden" maxlength="6">
        <input name="phone_number" value="{{ $customer->phone_number ?? old('phone_number') }}" type="password" class="hidden" maxlength="6">
        <input name="nominal" value="{{ $nominal ?? old('nominal') }}" type="password" class="hidden" maxlength="6">
        <input name="description" value="{{ $description ?? old('description') }}" type="password" class="hidden" maxlength="6">
        <div class="flex items-center gap-4 mt-5 pin-circles">
            <div id="pin1" class="bg-c-pink-white rounded-full h-6 w-6"></div>
            <div id="pin2" class="bg-c-pink-white rounded-full h-6 w-6"></div>
            <div id="pin3" class="bg-c-pink-white rounded-full h-6 w-6"></div>
            <div id="pin4" class="bg-c-pink-white rounded-full h-6 w-6"></div>
            <div id="pin5" class="bg-c-pink-white rounded-full h-6 w-6"></div>
            <div id="pin6" class="bg-c-pink-white rounded-full h-6 w-6"></div>
        </div>
        <medium class="w-full help-block text-danger text-center py-2 text-red-500">{{ $errors->has('pin') ? $errors->first('pin') : '' }}</medium>
        <div class="grid grid-cols-3 gap-4 my-12 text-2xl font-bold text-c-earlier-black">
            <button type="button" onclick="appendToInput('1')" class="rounded-full bg-white py-4 px-6">1</button>
            <button type="button" onclick="appendToInput('2')" class="rounded-full bg-white py-4 px-6">2</button>
            <button type="button" onclick="appendToInput('3')" class="rounded-full bg-white py-4 px-6">3</button>
            <button type="button" onclick="appendToInput('4')" class="rounded-full bg-white py-4 px-6">4</button>
            <button type="button" onclick="appendToInput('5')" class="rounded-full bg-white py-4 px-6">5</button>
            <button type="button" onclick="appendToInput('6')" class="rounded-full bg-white py-4 px-6">6</button>
            <button type="button" onclick="appendToInput('7')" class="rounded-full bg-white py-4 px-6">7</button>
            <button type="button" onclick="appendToInput('8')" class="rounded-full bg-white py-4 px-6">8</button>
            <button type="button" onclick="appendToInput('9')" class="rounded-full bg-white py-4 px-6">9</button>
            <div></div>
            <button type="button" onclick="appendToInput('0')" class="rounded-full bg-white py-4 px-6">0</button>
            <button type="button" onclick="clearInput(event)">
                <img src="/images/erase.svg" alt="erase" class="object-contain mx-auto">
            </button>
        </div>
        <button type="submit" class="rounded-full text-white bg-c-pink w-16 h-16 text-2xl font-bold text-center p-3 pt-4">OK</button>
    </form>
</div>
<script>
    // Retrieve the element by its ID
    function appendToInput(value) {
        var currentVal = $('#pin').val();

        if (currentVal.length < 14) {
            $('#pin').val(currentVal + value);
        }

        setColor();
    }

    function clearInput() {
        var currentVal = $('#pin').val();
        $('#pin').val(currentVal.slice(0, currentVal.length - 1));

        setColor();
    }

    function setColor() {
        var currentVal = $('#pin').val();
        var circles = $('.pin-circles > div');
        for (var i = 0; i < circles.length; i++) {
            if (i < currentVal.length) {
                circles.eq(i).addClass('bg-yellow-400');
            } else {
                circles.eq(i).removeClass('bg-yellow-400');
            }
        }
    }
</script>
@endsection