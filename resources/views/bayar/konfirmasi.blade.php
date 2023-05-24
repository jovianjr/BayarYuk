@extends('layouts.master')

@section('content')
<div>
    <div class='bg-grad-pink h-screen font-bolxtd w-full te-3xl px-6 flex flex-col items-center justify-center text-sm'>
        <div class="bg-white px-6 py-4 rounded-xl flex items-center justify-between w-72 mb-8 border border-c-blue-white shadow-c-25">
            <img src="https://picsum.photos/200" alt="photo" class="rounded-full h-16 w-16">
            <div class="flex flex-col font-semibold gap-2 w-2/3">
                <p class="text-xs">Bayar ke:</p>
                <p class="text-sm">MakanCuy</p>
            </div>
        </div>
        <p class="text-green-800 text-4xl font-semibold mb-16">Rp 100.000</p>
        <button class="bg-c-pink font-semibold text-white px-6 py-2 rounded-xl w-[288px]">
            KONFIRMASI
        </button>
    </div>
</div>
@endsection