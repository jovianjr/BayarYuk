@extends('layouts.master')

@section('content')
<div>
    <div class='bg-grad-pink h-screen font-bolxtd w-full te-3xl px-6 flex flex-col items-center justify-center text-sm'>
        <a href="/transfer/qr" class="bg-red-500 rounded-xl p-4 mb-8">
            <img src="/images/transfer/icon-qr.svg" alt="icon-qr" class="text-white h-16 w-16 mx-auto mb-2">
            <p class="text-white font-semibold">Kembali Scan</p>
        </a>
        <form action="" class="flex flex-col w-72">
            <input type="text" id="inputNoHP" placeholder="Masukkan Nomor HP Penerima" class="p-3 rounded-xl placeholder:text-gray-400 text-c-earlier-black border border-c-pink">

            <div class="grid grid-cols-3 gap-10 my-12 text-lg">
                <button onclick="appendToInput(event, '1')">1</button>
                <button onclick="appendToInput(event, '2')">2</button>
                <button onclick="appendToInput(event, '3')">3</button>
                <button onclick="appendToInput(event, '4')">4</button>
                <button onclick="appendToInput(event, '5')">5</button>
                <button onclick="appendToInput(event, '6')">6</button>
                <button onclick="appendToInput(event, '7')">7</button>
                <button onclick="appendToInput(event, '8')">8</button>
                <button onclick="appendToInput(event, '9')">9</button>
                <div></div>
                <button onclick="appendToInput(event, '0')">0</button>
                <button onclick="clearInput(event)">Clear</button>
            </div>

            <button class="bg-c-pink font-semibold text-white px-6 py-2 rounded-xl mt-6">
                LANJUTKAN
            </button>

        </form>
    </div>
</div>
<script>
    function appendToInput(event, value) {
        event.preventDefault();
        document.getElementById('inputNoHP').value += value;
    }

    function clearInput() {
        event.preventDefault();
        document.getElementById('inputNoHP').value = '';
    }
</script>
@endsection