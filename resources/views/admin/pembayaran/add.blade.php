@extends('layouts.master')

@section('content')
@include('includes.header', ['pageTitle'=>'Tambah Pembayaran', 'back'=>'/pembayaran'])
<div class='bg-grad-pink-2 h-full w-full flex flex-col items-center text-sm max-h-screen overflow-auto px-8 pt-28 pb-4'>
    <div class='bg-white w-full h-auto flex flex-col px-4 py-6 rounded-lg justify-between'>
        <form action="{{ url('/pembayaran/store') }}" method="post" class='flex flex-col gap-4'>
            @csrf
            <div class="flex flex-col gap-2">
                <label class="text-md">Nominal</label>
                <input type="number" class="w-full rounded-md placeholder:text-sm placeholder:text-slate-400" name="nominal" placeholder="Masukkan nominal" required />
                <small class="w-full help-block text-danger text-center py-2 text-red-500">{{ $errors->has('nominal') ? $errors->first('nominal') : '' }}</small>
            </div>
            <button type="submit" class='py-2 bg-c-pink text-white text-center rounded-sm font-semibold'>Tambah</button>
        </form>
    </div>
</div>
@endsection