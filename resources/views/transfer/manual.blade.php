@extends('layouts.master')

@section('content')
@include('includes.header', ['pageTitle'=>'Transfer ke Pengguna', 'back'=>'/'])
<div>
    <div class='bg-grad-pink h-screen w-full px-6 flex flex-col items-center justify-center text-sm'>
        <a href="/transfer/qr" class="bg-red-500 rounded-xl p-4 mb-8">
            <img src="/images/transfer/icon-qr.svg" alt="icon-qr" class="text-white h-16 w-16 mx-auto mb-2">
            <p class="text-white font-semibold">Kembali Scan</p>
        </a>
        <form action="{{ url('/transfer/nominal') }}" method="post" class="flex flex-col w-72">
            @csrf
            <input type="text" name="type" value="manual" class="hidden">
            <input type="text" id="phone_number" name="phone_number" placeholder="Masukkan Nomor HP Penerima" class="p-3 rounded-xl placeholder:text-gray-400 text-c-earlier-black border border-c-pink">
            <small class="w-full help-block text-danger text-center py-2 text-red-500">{{ $errors->has('phone_number') ? $errors->first('phone_number') : '' }}</small>

            <div class="grid grid-cols-3 gap-10 my-12 text-lg">
                <button type="button" onclick="appendToInput('1')">1</button>
                <button type="button" onclick="appendToInput('2')">2</button>
                <button type="button" onclick="appendToInput('3')">3</button>
                <button type="button" onclick="appendToInput('4')">4</button>
                <button type="button" onclick="appendToInput('5')">5</button>
                <button type="button" onclick="appendToInput('6')">6</button>
                <button type="button" onclick="appendToInput('7')">7</button>
                <button type="button" onclick="appendToInput('8')">8</button>
                <button type="button" onclick="appendToInput('9')">9</button>
                <div></div>
                <button type="button" onclick="appendToInput('0')">0</button>
                <button type="button" onclick="clearInput(event)">
                    <img src="/images/erase.svg" alt="erase" class="object-contain mx-auto">
                </button>
            </div>

            <button class="bg-c-pink font-semibold text-white px-6 py-2 rounded-xl mt-6">
                LANJUTKAN
            </button>
        </form>
    </div>
</div>
<script>
    // Retrieve the element by its ID
    function appendToInput(value) {
        var currentVal = $('#phone_number').val();

        if (currentVal.length < 14) {
            $('#phone_number').val(currentVal + value);
        }
    }

    function clearInput() {
        var currentVal = $('#phone_number').val();
        $('#phone_number').val(currentVal.slice(0, currentVal.length - 1));
    }
</script>
@endsection