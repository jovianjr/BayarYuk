@extends('layouts.master')

@section('content')
@include('includes.header', ['pageTitle'=>'Transfer ke Pengguna', 'back'=>'/transfer'])
<div>
    <div class='bg-grad-pink h-screen font-bolxtd w-full te-3xl px-6 flex flex-col items-center justify-center text-sm'>
        <div class="bg-white px-6 py-4 rounded-xl flex items-center justify-between w-72 mb-8 border border-c-blue-white shadow-c-25">
            <img src="{{ $customer->photo ?? 'https://picsum.photos/200' }}" alt="photo" class="rounded-full h-16 w-16">
            <div class="flex flex-col font-semibold">
                <p class="text-sm mb-2">{{ $customer->name }}</p>
                <p class="text-xs">{{ $customer->phone_number }}</p>
            </div>
        </div>
        <form action="{{ url('/transfer/konfirmasi') }}" method="post" class="flex flex-col w-72">
            @csrf
            <input type="hidden" name="phone_number" value="{{ $customer->phone_number }}" />
            <input type="text" name="nominal" id="nominal" placeholder="Masukkan Nominal" class="p-3 rounded-xl placeholder:text-gray-400 text-c-earlier-black border border-c-pink">
            <small class="w-full help-block text-danger text-center py-2 text-red-500">{{ $errors->has('nominal') ? $errors->first('nominal') : '' }}</small>

            <div class="flex gap-2">
                <a href="{{ url('/transfer') }}" class="bg-white w-1/2 font-semibold text-c-pink border border-c-pink px-6 py-2 rounded-xl mt-6">
                    BATAL
                </a>
                <button type="submit" class="bg-c-pink w-1/2 font-semibold text-white px-6 py-2 rounded-xl mt-6">
                    LANJUTKAN
                </button>
            </div>
        </form>

        <div class="grid grid-cols-3 gap-10 mt-12 text-lg">
            <button type="button" onclick="appendToInput('1')">1</button>
            <button type="button" onclick="appendToInput('2')">2</button>
            <button type="button" onclick="appendToInput('3')">3</button>
            <button type="button" onclick="appendToInput('4')">4</button>
            <button type="button" onclick="appendToInput('5')">5</button>
            <button type="button" onclick="appendToInput('6')">6</button>
            <button type="button" onclick="appendToInput('7')">7</button>
            <button type="button" onclick="appendToInput('8')">8</button>
            <button type="button" onclick="appendToInput('9')">9</button>
            <button type="button" onclick="appendToInput('0')">0</button>
            <button type="button" onclick="appendToInput('000')">000</button>
            <button type="button" onclick="clearInput(event)">
                <img src="/images/erase.svg" alt="erase" class="object-contain mx-auto">
            </button>
        </div>
    </div>
</div>
<script>
    // Retrieve the element by its ID
    function appendToInput(value) {
        var currentVal = $('#nominal').val();

        if (currentVal.length < 14) {
            $('#nominal').val(currentVal + value);
        }

        setColor();
    }

    function clearInput() {
        var currentVal = $('#nominal').val();
        $('#nominal').val(currentVal.slice(0, currentVal.length - 1));

        setColor();
    }

    function setColor() {
        var currentVal = $('#nominal').val();
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