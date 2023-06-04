@extends('layouts.master')

@section('content')
@include('includes.header', ['pageTitle'=>'Pengaturan', 'back'=>'/profile'])
<div class="bg-grad-pink w-full h-full px-10 pt-24 pb-20">
    @if (session()->has('success'))
    <div class="mb-4 bg-green-400 py-3 px-4 rounded-lg text-white text-sm"> {{ session('success') }}</div>
    @endif

    @if(session()->has('error'))
    <div class="mb-4 bg-green-400 py-3 px-4 rounded-lg text-white text-sm"> {{ session('error') }}</div>
    @endif

    <form action="{{ url('/profile/pengaturan/store') }}" method="post" class="bg-white w-full h-full rounded-lg border border-c-pink px-6 py-4 flex flex-col gap-4">
        @csrf
        <div class="flex flex-col gap-2">
            <label class="font-semibold text-sm">APP Key</label>
            <input type="text" name="" placeholder="APP Key" class="rounded-md bg-slate-200 text-c-earlier-black placeholder:text-c-earlier-black/50" value="{{ $data->app_key }}" disabled />
        </div>
        <div class="flex flex-col gap-2">
            <label class="font-semibold text-sm">Callback URL Success</label>
            <input type="text" name="callback_url_success" placeholder="https://xxxxxxx" class="rounded-md bg-slate-200 text-c-earlier-black placeholder:text-c-earlier-black/50" value="{{ $data->callback_url_success }}" />
            <small class="w-full help-block text-danger text-red-500">{{ $errors->has('callback_url_success') ? $errors->first('callback_url_success') : '' }}</small>
        </div>
        <div class="flex flex-col gap-2">
            <label class="font-semibold text-sm">Callback URL Failed</label>
            <input type="text" name="callback_url_failed" placeholder="https://xxxxxxx" class="rounded-md bg-slate-200 text-c-earlier-black placeholder:text-c-earlier-black/50" value="{{ $data->callback_url_failed }}" />
            <small class="w-full help-block text-danger text-red-500">{{ $errors->has('callback_url_failed') ? $errors->first('callback_url_failed') : '' }}</small>
        </div>
        <button type="submit" class="bg-c-pink rounded-md w-2/5 py-2 px-3 text-white font-semibold mt-4 self-end">Simpan</button>
    </form>
</div>
@endsection