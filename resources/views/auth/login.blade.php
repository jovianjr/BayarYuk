@extends('layouts.master')

@section('content')
<!-- Session Status -->
<x-auth-session-status class="mb-4" :status="session('status')" />

<div class="px-20 py-12 w-full h-full bg-grad-pink">
    <form method="POST" action="{{ route('login') }}" class="w-full h-full">
        @csrf

        @if($user_id)
        <div class="mt-4 hidden">
            <x-label for="id" :value="__('id')" />

            <x-input id="id" class="block mt-1 w-full" type="text" name="id" :value="$user_id" required />
        </div>

        <div class="mt-4 hidden">
            <x-label for="password" :value="__('Password')" />

            <x-input id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="current-password" />
        </div>

        <div class="mt-4 hidden">
            <label for="remember_me" class="inline-flex items-center">
                <input id="remember_me" type="checkbox" class="rounded border-gray-300 text-indigo-600 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" name="remember" checked>
                <span class="ml-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
            </label>
        </div>

        <div class='bg-grad-pink h-screen font-bolxtd w-full te-3xl px-6 flex flex-col items-center justify-center text-sm'>
            <p class="font-semibold text-sm text-c-earlier-black">Masukkan PIN</p>
            <div class="flex items-center gap-4 mt-5 pin-circles">
                <div id="pin1" class="bg-c-pink-white rounded-full h-6 w-6"></div>
                <div id="pin2" class="bg-c-pink-white rounded-full h-6 w-6"></div>
                <div id="pin3" class="bg-c-pink-white rounded-full h-6 w-6"></div>
                <div id="pin4" class="bg-c-pink-white rounded-full h-6 w-6"></div>
                <div id="pin5" class="bg-c-pink-white rounded-full h-6 w-6"></div>
                <div id="pin6" class="bg-c-pink-white rounded-full h-6 w-6"></div>
            </div>
            <div class="grid grid-cols-3 gap-4 my-12 text-2xl font-bold text-c-earlier-black">
                <button type="button" onclick="appendToInput('1')" class="rounded-full bg-white py-4 px-6 flex items-center justify-center">1</button>
                <button type="button" onclick="appendToInput('2')" class="rounded-full bg-white py-4 px-6 flex items-center justify-center">2</button>
                <button type="button" onclick="appendToInput('3')" class="rounded-full bg-white py-4 px-6 flex items-center justify-center">3</button>
                <button type="button" onclick="appendToInput('4')" class="rounded-full bg-white py-4 px-6 flex items-center justify-center">4</button>
                <button type="button" onclick="appendToInput('5')" class="rounded-full bg-white py-4 px-6 flex items-center justify-center">5</button>
                <button type="button" onclick="appendToInput('6')" class="rounded-full bg-white py-4 px-6 flex items-center justify-center">6</button>
                <button type="button" onclick="appendToInput('7')" class="rounded-full bg-white py-4 px-6 flex items-center justify-center">7</button>
                <button type="button" onclick="appendToInput('8')" class="rounded-full bg-white py-4 px-6 flex items-center justify-center">8</button>
                <button type="button" onclick="appendToInput('9')" class="rounded-full bg-white py-4 px-6 flex items-center justify-center">9</button>
                <div></div>
                <button type="button" onclick="appendToInput('0')" class="rounded-full bg-white py-4 px-6 flex items-center justify-center">0</button>
                <button type="button" onclick="clearInput(event)">
                    <img src="/images/erase.svg" alt="erase" class="object-contain mx-auto">
                </button>
            </div>
            <x-button class="rounded-full text-white bg-c-pink w-16 h-16 text-2xl font-bold text-center p-3 pt-4">OK</x-button>
        </div>
        @else
        <div class="flex flex-col items-center justify-between h-full">
            <img src="/images/welcome/saving.png" alt="Login Illustration" class="w-10 aspect-square" />
            <img src="/images/welcome/saving.png" alt="Login Illustration" class="w-1/2 aspect-square" />

            <div class="flex flex-col items-center justify-center gap-6">
                <!-- Validation Errors -->
                <x-auth-validation-errors class="mb-4" :errors="$errors" />

                <input type="tel" pattern="[0-9]{1,15}" name="phone_number" placeholder="Masukkan No. Telepon" class="w-full px-6 py-3 rounded-md border-c-pink placeholder:text-gray-300 placeholder:text-center" />

                <x-button class="w-full flex justify-center items-center !bg-c-pink font-bold !text-lg py-2" onclick="checkPhone()">
                    {{ __('Log in') }}
                </x-button>
            </div>
        </div>
        @endif
    </form>
</div>

<script>
    // // cek no hp
    // function checkPhone() {
    //     const url = "{{ url('/login/phone') }}"
    //     $.ajax({
    //         url: url,
    //         type: "GET",
    //         success: function(response) {
    //             // Handle the successful response here
    //             console.log("AJAX request successful");
    //             7
    //         },
    //         error: function(xhr, status, error) {
    //             // Handle the error here
    //             console.log("AJAX request failed");
    //         }
    //     });
    // }

    // Retrieve the element by its ID
    function appendToInput(value) {
        var currentVal = $('#password').val();
        if (currentVal.length < 6) {
            $('#password').val(currentVal + value);
        }

        setColor();
    }

    function clearInput() {
        var currentVal = $('#password').val();
        $('#password').val(currentVal.slice(0, currentVal.length - 1));

        setColor();
    }

    function setColor() {
        var currentVal = $('#password').val();
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