@extends('layouts.master')

@section('content')
<div>
    <div class='bg-grad-pink h-screen font-bolxtd w-full te-1xl px-2 flex flex-col items-center justify-center text-sm px-6 relative overflow-hidden'>
        <div class="absolute -top-[30%] w-[530px] h-[530px] bg-c-pink rounded-full"></div>
        <h1 class="text-white text-2xl self-start z-10 font-bold text-center m-auto">Halo Fiorenza,</h1>
        <h1 class="text-white text-2xl self-start z-10 font-bold text-center m-auto">perlu bantuan?</h1>

        <form class='flex flex-row gap-3 items-center justify-center w-full my-4 z-10'>
            <input type="text" id="inputQuery" placeholder="Masukkan kata kunci pencarian" class="w-full p-3 rounded-xl placeholder:text-gray-400 text-c-earlier-black border border-c-blue-white text-sm pl-12">
            <img src="/images/icon/search.svg" alt="searchicon" class="absolute left-[32px]">
        </form>

        <div class='grid grid-col gap-3 z-10 overflow-y-scroll'>
            <div class='border border-white bg-white shadow-c-25 w-full h-auto rounded-xl py-3 px-2'>
                <p class="text-c-earlier-black text-sm font-semibold">Apa solusi jika uangnya belum masuk ke rekening tujuan tetapi transaksi sudah berhasil?</p>
                <p class="text-c-earlier-black text-sm">Jika dana belum sampai ke tujuan, penerima dana bisa melakukan konfirmasi ke pihak alphonsus jovian untuk melakukan pengecekan mutasi rekening. </p>
            </div>
            <div class='border border-white bg-white shadow-c-25 w-full h-auto rounded-xl py-3 px-2'>
                <p class="text-c-earlier-black text-sm font-semibold">Jika saya sudah transfer tapi nominalnya salah, apa yang harus saya lakukan?</p>
                <p class="text-c-earlier-black text-sm">Jika transfer sudah ke kirim, anda dapat meminta pengembalian dana yang kelebihan ke pihak yang ada</p>
            </div>
            <div class='border border-white bg-white shadow-c-25 w-full h-auto rounded-xl py-3 px-2'>
                <p class="text-c-earlier-black text-sm font-semibold">Apa yang harus dilakukan jika lupa password sedangkan ingin log out?</p>
                <p class="text-c-earlier-black text-sm">Anda bisa melakukan penghapusan akun dan melakukan registrasi kembali</p>
            </div>
            <div class='border border-white bg-white shadow-c-25 w-full h-auto rounded-xl py-3 px-2'>
                <p class="text-c-earlier-black text-sm font-semibold">Bagaimana melakukan pembayaran ke pihak yang ditujukan?</p>
                <p class="text-c-earlier-black text-sm">Anda dapat menuju ke menu bayar dan bisa memilih antara melakukan scan QR atau memasukkan nomor tujuan</p>
            </div>
            <div class='border border-white bg-white shadow-c-25 w-full h-auto rounded-xl py-3 px-2'>
                <p class="text-c-earlier-black text-sm font-semibold">Apa yang harus dilakukan jika akun tidak bisa diverifikasi?</p>
                <p class="text-c-earlier-black text-sm">Anda dapat mengontak pihak terkait untuk dapat melakukan verifikasi, jika tidak bisa silahkan menghapus akun dan buat kembali.</p>
            </div>
            <div class='border border-white bg-white shadow-c-25 w-full h-auto rounded-xl py-3 px-2'>
                <p class="text-c-earlier-black text-sm font-semibold">Bagaimana cara untuk mengatasi tidak bisa melakukan transfer atau bayar?</p>
                <p class="text-c-earlier-black text-sm">Jika tidak bisa melakukan bayar, silahkan log out dan login kembali sehingga dapat melakukan transfer</p>
            </div>
            <div class='border border-white bg-white shadow-c-25 w-full h-auto rounded-xl py-3 px-2'>
                <p class="text-c-earlier-black text-sm font-semibold">Bagaimana melakukan pembayaran ke pihak yang ditujukan?</p>
                <p class="text-c-earlier-black text-sm">Anda dapat menuju ke menu bayar dan bisa memilih antara melakukan scan QR atau memasukkan nomor tujuan</p>
            </div>
            <div class='border border-white bg-white shadow-c-25 w-full h-auto rounded-xl py-3 px-2'>
                <p class="text-c-earlier-black text-sm font-semibold">Siapa yang dapat dihubungi jika mengalami kendala dalam pembayaran</p>
                <p class="text-c-earlier-black text-sm">Anda dapat menghubungi polisi jika anda mengalami kendala dalam proses pembayaran</p>
            </div>
            <div class='border border-white bg-white shadow-c-25 w-full h-auto rounded-xl py-3 px-2'>
                <p class="text-c-earlier-black text-sm font-semibold">Bagaimana cara pengajuan refund di aplikasi?</p>
                <p class="text-c-earlier-black text-sm">Anda dapat menghubungi pohak terkait untuk dapat melakukan refund pada aplikasi</p>
            </div>
            <div class='border border-white bg-white shadow-c-25 w-full h-auto rounded-xl py-3 px-2'>
                <p class="text-c-earlier-black text-sm font-semibold">Apa yang dilakukan jika profil tidak dapat di edit?</p>
                <p class="text-c-earlier-black text-sm">Anda dapat log out terlebih dahulu lalu log in kembali dan mencobakan kembali untuk melakukan edit</p>
            </div>

        </div>
    </div>
    <div class="fixed z-10 w-full h-16 max-w-lg -translate-x-1/2 bg-white bottom-0 left-1/2 rounded-t-3xl drop-shadow-xl border border-gray-300">
        <div class="grid h-full max-w-lg grid-cols-5 mx-auto text-c-earlier-black">
            <a href="/" type="button" class="inline-flex flex-col items-center justify-center px-5 hover:bg-yellow-400 rounded-tl-3xl">
                <span class="iconify" data-icon="material-symbols:home-outline" data-width="24" data-height="24"></span>
                <p class="font-medium text-xs">Home</p>
            </a>
            <a href="/riwayat" type="button" class="inline-flex flex-col items-center justify-center px-5 hover:bg-yellow-400">
                <span class="iconify" data-icon="gg:list" data-width="24" data-height="24"></span>
                <p class="font-medium text-xs">Riwayat</p>
            </a>
            <a href="bayar/qr" type="button" class="inline-flex flex-col items-center justify-center px-5 hover:bg-yellow-400">
                <div class="absolute -top-[35%] rounded-full bg-c-pink p-1">
                    <img src="/images/icon/bayar-pesawat.svg" alt="bayar" class="translate-x-0.5">
                </div>
                <p class="font-medium text-xs text-c-pink mt-6">Bayar</p>
            </a>
            <a href="help" type="button" class="inline-flex flex-col items-center justify-center px-5 hover:bg-yellow-400">
                <span class="iconify" data-icon="material-symbols:help-outline" data-width="24" data-height="24"></span>
                <p class="font-medium text-xs">Bantuan</p>
            </a>
            <a href="profile" type="button" class="inline-flex flex-col items-center justify-center px-5 hover:bg-yellow-400 rounded-tr-3xl">
                <span class="iconify" data-icon="gg:profile" data-width="24" data-height="24"></span>
                <p class="font-medium text-xs">Profile</p>
            </a>
        </div>
    </div>
    @endsection