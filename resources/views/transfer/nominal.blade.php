@extends('layouts.master')

@section('content')
<div>
    <div class='bg-grad-pink h-screen font-bolxtd w-full te-3xl px-6 flex flex-col items-center justify-center text-sm'>
        <div class="bg-white px-6 py-4 rounded-xl flex items-center justify-between w-72 mb-8 border border-c-blue-white shadow-c-25">
            <img src="https://picsum.photos/200" alt="photo" class="rounded-full h-16 w-16">
            <div class="flex flex-col font-semibold">
                <p class="text-sm mb-2">Yulina Budi Prayastiti</p>
                <p class="text-xs">0811 2334 5678</p>
            </div>
        </div>
        <form action="" class="flex flex-col w-72">
            <input type="text" id="inputNominal" placeholder="Masukkan Nominal" class="p-3 rounded-xl placeholder:text-gray-400 text-c-earlier-black border border-c-pink">

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
                <button onclick="appendToInput(event, '0')">0</button>
                <button onclick="appendToInput(event, '000')">000</button>
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
        inputField = document.getElementById('inputNominal');

        const currentValue = inputField.value;
        var newValue = currentValue.replace(/^0+/, '') + value;
        inputField.value = newValue;
    }

    function clearInput() {
        event.preventDefault();
        document.getElementById('inputNominal').value = '';
    }
</script>
@endsection