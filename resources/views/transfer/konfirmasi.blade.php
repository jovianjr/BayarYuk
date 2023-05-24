@extends('layouts.master')

@section('content')
<div>
    <div class='bg-grad-pink h-screen font-bolxtd w-full te-3xl px-6 flex flex-col items-center justify-center text-sm'>
        <div class="bg-white px-6 py-4 rounded-xl flex items-center justify-between w-72 mb-8 border border-c-blue-white shadow-c-25">
            <img src="https://picsum.photos/200" alt="photo" class="rounded-full h-16 w-16">
            <div class="flex flex-col font-semibold gap-2">
                <p class="text-xs">Bayar ke:</p>
                <p class="text-sm">Yulina Budi Prayastiti</p>
                <p class="text-xs">0811 2334 5678</p>
            </div>
        </div>
        <p class="text-green-800 text-4xl font-semibold mb-16">Rp 100.000</p>
        <form action="" class="flex flex-col w-72">
            <textarea type="text" placeholder="Catatan (opsional)" class="p-3 rounded-xl placeholder:text-gray-400 text-c-earlier-black h-48 border border-c-pink"></textarea>

            <button class="bg-c-pink font-semibold text-white px-6 py-2 rounded-xl mt-6">
                KONFIRMASI
            </button>

        </form>
    </div>
</div>
@endsection